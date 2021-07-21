<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use App\Models\Topic;
use App\Models\TopicEmbed;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageRoom extends Component
{

    public $roomId, $data, $room, $title, $body, $parent = 0, $type, $optIsReplied = false, $optCodeEditor = false, $optYoutube = false, $deadline, $youtubeLink;

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

        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'type' => 'required',
        ]);

        $topic = Topic::create([
            'title' => $this->title,
            'body' => $this->body,
            'is_replied' => $this->optIsReplied,
            'type_id' => $this->type,
            'deadline' => $this->deadline,
            'parent' => $this->parent == "parent" ? NULL : $this->parent,
            'user_id' => Auth::id(),
            'room_id' => $this->roomId,
        ]);

        if($this->youtubeLink != ""){
            TopicEmbed::create([
                'url' => $this->youtubeLink,
                'topic_id' => $topic->id,
                'type' => 1
            ]);
        }


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
