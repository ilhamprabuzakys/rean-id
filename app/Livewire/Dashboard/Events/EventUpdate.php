<?php

namespace App\Livewire\Dashboard\Events;

use Livewire\Component;

class EventUpdate extends Component
{

    public $title, $description, $province, $city, $merge_date, $start_date, $end_date, $contact_email, $organizer, $latitude, $longitude, $location, $file_path, $status, $ebook, $user_id;

    public function mount($user, $ebook)
    {
        $this->user_id = $user;
        $this->ebook = $ebook;
        $this->title = $ebook->title;
        $this->description = $ebook->description;
        $this->city = $ebook->city;
        $this->merge_date = $ebook->start_date . ' to ' . $ebook->end_date;

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
        return view('livewire.dashboard.events.event-update');
    }

    public function update()
    {
        $dateRange = explode(' to ', $this->merge_date);
        $startDate = $dateRange[0];
        $endDate = $dateRange[1] ?? $dateRange[0];
        $this->start_date = $startDate;
        $this->end_date = $endDate;
    }
}
