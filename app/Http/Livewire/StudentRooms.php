<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\RoomUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class StudentRooms extends Component
{
    public $data, $room_code;
    public $updateMode = false;

    public function render()
    {
        $this->data = User::where('id', Auth::id())->with(['userRomes.room', 'userRomes.role'])->firstOrFail();
        return view('livewire.student-rooms');
    }

    public function validate_room(){

        $roomId = Room::select('id')->where('room_code', $this->room_code)->first();

        if($roomId){
            $roomUser = RoomUsers::where([
                ['user_id', '=', Auth::id()],
                ['room_id', '=', $roomId->id],
            ])->count();

            if($roomUser > 0){
                session()->flash('message', "You've joined this room.");
            }else{
                RoomUsers::create([
                    'room_id' => $roomId->id,
                    'role_id' => 1,
                    'user_id' => Auth::id()
                ]);

                $this->emit('joined_room');
            }

        }else{
            session()->flash('message', 'Room code not valid, please input the valid room code');
        }

    }

    public function store(){
        $this->validate([
            'room_code' => 'required',
        ]);

        $this->validate_room();

        $this->resetInput();
    }

    public function resetInput(){
        $this->name = null;
        $this->description = null;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInput();
    }
}
