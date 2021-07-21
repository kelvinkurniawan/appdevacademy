<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.rooms');
    }

    public function indexStudent(){

        //$user = User::where('id', Auth::id())->with(['userRomes.room', 'userRomes.role', 'userRomes'])->firstOrFail();
        //return $user->userRomes;
        return view('pages.student.rooms');
    }

    public function roomDetailStudent($roomId){
        $data = Topic::with('type')->where('room_id', $roomId)->get();
        $room = Room::where('id', $roomId)->first();
        // return $data;
        return view('pages.student.room_detail', compact('data', 'room'));
    }

    public function roomDetailTeacher($roomId){
        $room = Room::where('id', $roomId)->first();
        return view('pages.manage-room', compact('room'));
    }
}
