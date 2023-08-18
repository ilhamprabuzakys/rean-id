<?php

namespace App\Livewire\Dashboard\Events;

use DOMDocument;
use App\Models\Event;
use Livewire\Component;
use App\Models\FileEvent;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EventCreate extends Component
{
    use WithFileUploads;

    public $title, $slug, $description, $province, $city, $merge_date, $start_date, $end_date, $contact_email, $organizer, $latitude, $longitude, $location, $status, $user_id;
    public $files = [];

    public function mount($user)
    {
        $this->user_id = $user;
    }

    private function rules()
    {
        return [
            'title' => ['required', 'min:4', Rule::unique('events')],
            'description' => ['required', 'min:4'],
            'province' => ['required'],
            'city' => ['required'],
            'merge_date' => ['required'],
            'contact_email' => ['required'],
            'organizer' => ['required'],
            'location' => ['required'],
            'files.*' => ['max:20000', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    protected $message = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul tidak boleh terlalu pendek',
        'description.required' => 'Deskripsi harus diisi',
        'description.min' => 'Deskripsi tidak boleh terlalu pendek',
        'province.required' => 'Provinsi harus diisi',
        'city.required' => 'Kota harus diisi',
        'merge_date.required' => 'Tanggal harus diisi',
        'contact_email.required' => 'Kontak Email harus diisi',
        'organizer.required' => 'Penyelenggara harus diisi',
        'location.required' => 'Lokasi harus diisi',
        'files.*.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'files.*.mimes' => 'Format file harus gambar',
    ];

    public function render()
    {
        return view('livewire.dashboard.events.event-create');
    }

    public function store()
    {
        // dd($this->all());
        try {
            $this->slug = Str::slug($this->title);
            $this->title = Str::of($this->title)->title();

            $this->validate($this->rules(), $this->message);

            $this->parseDateRange();
            $this->processDescriptionImages();

            // Simpan event ke variabel
            $event = Event::create($this->all());

            // Simpan files
            $this->storeFiles($event->id);  // Mengirim id event ke fungsi storeFiles
            $this->resetInput();
            $this->dispatch('stored');
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil dibuat',
                'text' => 'Berhasil menambahkan data Event',
            ]);
            return redirect()->route('events.index');
        } catch (ValidationException $e) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Ada beberapa kesalahan pada input Anda <br>' . $e->validator->errors(),
            ]);

            // Mengirim error bag ke komponen Livewire
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    private function storeFiles($eventId)
    {
        if ($this->files) {
            $event = Event::find($eventId);
            $eventName = Str::slug($event->title); // Menggunakan slug agar aman untuk nama file

            foreach ($this->files as $index => $file) {
                $timestamp = now()->format('H:i_d-m-Y');
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file

                // Membuat format nama file
                $filename = "{$eventId}_{$eventName}_file-" . ($index + 1) . "_{$timestamp}.{$extension}";

                // Menyimpan file dengan nama yang telah diformat
                $path = $file->storeAs('events/cover', $filename);

                $storedPath = "storage/" . $path;

                FileEvent::create([
                    'file_path' => $storedPath,
                    'event_id' => $eventId
                ]);
            }
        }
    }

    private function parseDateRange()
    {
        $dateRange = explode(' to ', $this->merge_date);
        $this->start_date = $dateRange[0];
        $this->end_date = $dateRange[1] ?? $dateRange[0];
    }

    private function processDescriptionImages()
    {
        $content = $this->description;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        $directoryPath = public_path('storage/events/detail/');

        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            // Cek apakah ini adalah data base64
            if (strpos($src, 'data:image/') === 0) {
                $data = \base64_decode(explode(',', explode(';', $src)[1])[1]);
                $title = Str::slug($this->title);
                $timestamp = now()->format('H:i_d-m-Y');
                $key++;
                $image_name = "/storage/events/detail/{$title}_detail-{$key}_{$timestamp}.png";
                \file_put_contents(\public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $this->description = $dom->saveHTML();
    }

    #[On('updateLocation')]
    public function setLocation($data)
    {
        $this->city = $data['city'];
        $this->province = $data['province'];
        $this->location = $data['fullAddress'];
    }

    #[On('coordinatesUpdated')]
    public function updateCoordinates($coordinates)
    {
        dd($coordinates);
        $this->latitude = $coordinates['latitude'];
        $this->longitude = $coordinates['longitude'];
    }

    public function resetInput()
    {
        $this->title = null;
        $this->description = '';
        $this->province = null;
        $this->city = null;
        $this->start_date = null;
        $this->end_date = null;
        $this->merge_date = null;
        $this->organizer = null;
        $this->contact_email = null;
        $this->latitude = null;
        $this->longitude = null;
        $this->location = null;
        $this->files = null;
    }

    public function closeModal()
    {
        $this->dispatch('close-modal');
    }
}
