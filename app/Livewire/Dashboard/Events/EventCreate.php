<?php

namespace App\Livewire\Dashboard\Events;

use App\Models\Event;
use Livewire\Component;

class EventCreate extends Component
{
    protected $listeners = [
        "swalS",
        "swalE",
        "coordinatesUpdated" => 'updateCoordinates',
        'updateLocation' => 'setLocation',
    ];

    public $title, $description, $province, $city, $merge_date, $start_date, $end_date, $contact_email, $organizer, $latitude, $longitude, $location, $user_id;

    public function mount($user)
    {
        $this->user_id = $user->id;
    }

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
        $this->validate([
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:4'],
            'province' => ['required', 'min:4'],
            'city' => ['required', 'min:4'],
            'merge_date' => ['required'],
            'contact_email' => ['required'],
            'organizer' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'location' => ['required'],
        ]);
        Event::create($this->all());
        $this->emit('swalS', 'Pembuatan Event', 'Berhasil menambah data Event');
        // dd($this->all());

    }

    public function setLocation($data) {
        $this->city = $data['city'];
        $this->province = $data['province'];
        $this->location = $data['fullAddress'];
    }

    public function updateCoordinates($coordinates)
    {
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

    public function swalS($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'success',
            'title' => $title,
            'text' => $text,
        ]);
    }
    
    public function swalE($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'error',
            'title' => $title,
            'text' => $text,
        ]);
    }
}
