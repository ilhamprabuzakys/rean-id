<?php

namespace App\Livewire\Dashboard\Events;

use DOMDocument;
use App\Models\Event;
use Livewire\Component;
use App\Models\FileEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;

class EventUpdate extends Component
{
    use WithFileUploads;

    public $event, $user_id;
    public $title, $description, $province, $city, $merge_date, $start_date, $end_date, $contact_email, $organizer, $latitude, $longitude, $location, $status;
    public $files = [];
    public $existingFiles = [];
    public $filePathOrName = '';

    public function mount($event, $user)
    {
        $this->user_id = $user;
        $this->event = $event;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->province = $event->province;
        $this->city = $event->city;
        $this->organizer = $event->organizer;
        $this->contact_email = $event->contact_email;
        $this->start_date = $event->start_date;
        $this->end_date = $event->end_date;
        $this->merge_date = $event->start_date . ' to ' . $event->end_date;
        $this->latitude = $event->latitude;
        $this->longitude = $event->longitude;
        $this->location = $event->location;
        $this->status = $event->status;
        // Ambil semua file terkait dengan data ini
        $this->existingFiles = $event->files->map(function ($file) {
            return [
                'source' => asset($file->file_path),
                'options' => [
                    'type' => 'limbo',
                    'file' => [
                        'name' => basename($file->file_path),
                        'size' => filesize(public_path($file->file_path)),
                        'type' => mime_content_type(public_path($file->file_path))
                    ],
                    'metadata' => [
                        'id' => $file->id,
                    ],
                ],
            ];
        })->toArray();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', Rule::unique('events')->ignore($this->event->id)],
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

    protected $messages = [
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
        return view('livewire.dashboard.events.event-update');
    }

    public function update()
    {
        // dd($this->all());
        try {
            $this->validate($this->rules(), $this->messages);

            $this->parseDateRange();
            $this->storeFiles();
            $this->processDescriptionImages();

            $this->event->update($this->all());

            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Update Berhasil',
                'text' => 'Berhasil memperbarui data Event',
            ]);
        } catch (ValidationException $e) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Ada beberapa kesalahan pada input Anda',
            ]);

            // Mengirim error bag ke komponen Livewire
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    public function removeFile($filePathOrName)
    {
        $this->filePathOrName = $filePathOrName;
        $this->dispatch('swal:filepond', [
            'title' => 'File',
        ]); 
    }

    #[On('filepondDeleteConfirmed')]
    public function seriouslyRemoveFile()
    {
        // Coba temukan file berdasarkan path di database
        $fileEvent = FileEvent::where('file_path', 'like', '%' . $this->filePathOrName . '%')->first();

        if ($fileEvent) {
            // Ini adalah file yang sudah ada, jadi kita hapus dari database dan penyimpanan
            Storage::delete(str_replace('storage/', '', $fileEvent->file_path));
            $fileEvent->delete();
        } else {
            // Ini mungkin file baru yang di-upload, jadi kita hanya hapus dari penyimpanan
            Storage::delete('events/cover/' . $this->filePathOrName);
        }
    }

    private function parseDateRange()
    {
        $dateRange = explode(' to ', $this->merge_date);
        $this->start_date = $dateRange[0];
        $this->end_date = $dateRange[1] ?? $dateRange[0];
    }

    private function storeFiles()
    {
        if ($this->files) {
            $eventName = Str::slug($this->event->title); // Menggunakan slug agar aman untuk nama file

            foreach ($this->files as $index => $file) {
                $timestamp = now()->format('H:i_d-m-Y');
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file

                // Membuat format nama file
                $filename = "{$this->event->id}_{$eventName}_file-" . ($index + 1) . "_{$timestamp}.{$extension}";

                // Menyimpan file dengan nama yang telah diformat
                $path = $file->storeAs('events/cover', $filename);

                $storedPath = "storage/" . $path;

                FileEvent::create([
                    'file_path' => $storedPath,
                    'event_id' => $this->event->id
                ]);
            }
        }
    }

    private function processDescriptionImages()
    {
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

        $this->description = $dom->saveHTML();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal');
    }
}
