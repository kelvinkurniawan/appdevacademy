<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageRoom extends Component
{

    public $roomId, $data, $room, $title, $body, $parent = 0, $type = 0, $optIsReplied = false, $optCodeEditor = false, $optYoutube = false, $deadline;

    public function mount($roomId){
        $this->roomId = $roomId;
    }

    public function render()
    {
        $this->room = Room::where('id', $this->roomId)->get();
        $this->data = Topic::with(['user', 'type'])->where('room_id', $this->roomId)->get();

        return view('livewire.manage-room');
    }

    public function store(){
        Topic::create([
            'title' => $this->title,
            'body' => $this->body,
            'is_replied' => $this->optIsReplied,
            'type_id' => $this->type,
            'deadline' => $this->deadline,
            'parent' => $this->parent == "parent" ? NULL : $this->parent,
            'user_id' => Auth::id(),
            'room_id' => $this->roomId,
        ]);


        $this->resetInput();
    }

    public function resetInput(){
        $this->title = "";
        $this->body = "";
        $this->optIsReplied = "";
        $this->optYoutube = "";
        $this->optCodeEditor = "";
    }

    public function enableReplied(){
        $this->optIsReplied = true;
    }

    public function enableCodeEditor(){
        $this->optCodeEditor = true;
    }

    public function enableYoutube(){
        $this->optYoutube = true;
    }
}
