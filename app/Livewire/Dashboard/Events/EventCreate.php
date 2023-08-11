<?php

namespace App\Livewire\Dashboard\Events;

use App\Models\Event;
use DOMDocument;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventCreate extends Component
{
    use WithFileUploads;

    public $title, $description, $province, $city, $merge_date, $start_date, $end_date, $contact_email, $organizer, $latitude, $longitude, $location, $file_path, $status, $user_id;

    public function mount($user)
    {
        $this->user_id = $user;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:4'],
            'province' => ['required'],
            'city' => ['required'],
            'merge_date' => ['required'],
            'contact_email' => ['required'],
            'organizer' => ['required'],
            'location' => ['required'],
            'file_path' => ['max:20000', 'mimes:jpg,jpeg,png,webp'],
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
        'file_path.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'file_path.mimes' => 'Format file harus gambar',
    ];


    public function render()
    {
        return view('livewire.dashboard.events.event-create');
    }

    public function store()
    {
        $dateRange = explode(' to ', $this->merge_date);
        $startDate = $dateRange[0];
        $endDate = $dateRange[1] ?? $dateRange[0];
        $this->start_date = $startDate;
        $this->end_date = $endDate;

        if ($this->file_path) {
            // Jika ada file cover baru yang diunggah...
            $path = $this->file_path->store('events');
            $this->file_path = "storage/" . $path;
        }

        $content = $this->description;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = \base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/storage/events/detail/" . time() . $key . '.png';
            \file_put_contents(\public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        $this->description = $content;

        // dd($this->all());
        $this->validate();

        Event::create($this->all());
        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Berhasil dibuat',
            'text' => 'Berhasil menambahkan data Event',
        ]);
    }

    #[On('updateLocation')]
    public function setLocation($data) {
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
        $this->title = '';
        $this->description = '';
        $this->province = '';
        $this->city = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->merge_date = '';
        $this->organizer = '';
        $this->contact_email = '';
        $this->user_id = null;
        $this->latitude = '';
        $this->longitude = '';
        $this->location = '';
    }
}
