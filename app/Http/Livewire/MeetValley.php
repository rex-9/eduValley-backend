<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MeetValley extends Component
{
    public $isModalOpen = 0;

    public $room;

    public function render()
    {
        return view('livewire.meet.meet-valley');
    }


    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function meetValley()
    {
        $this->validate([
            'room' => 'required|min:3',
        ]);
        redirect()->route("meetValley", [$this->room]);
    }
}
