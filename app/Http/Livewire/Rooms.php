<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Rooms extends Component
{
    public $data, $name, $description, $room_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Room::all();
        return view('livewire.rooms');
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Room::create([
            'name' => $this->name,
            'description' => $this->description,
            'room_code' => Str::random(6),
            'user_id' => Auth::id()
        ]);

        $this->resetInput();

        $this->emit('roomStore');
    }

    public function edit($id){

        $this->updateMode = true;
        $room = Room::where('id', $id)->first();
        $this->room_id = $id;
        $this->name = $room->name;
        $this->description = $room->description;

    }

    public function update(){
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if($this->room_id){
            $room = Room::find($this->room_id);
            $room->update([
                'name' => $this->name,
                'description' => $this->description
            ]);

            $this->updateMode = false;

            $this->resetInput();

            $this->emit('roomStore');

        }
    }

    public function delete($id){
        if($id){
            Room::where('id', $id)->delete();
        }
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
