<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //

    public function show($id, $topic_id){

        $room = Room::where('id', $id)->first();
        $topic = Topic::with(['user', 'type', 'room', 'embed'])->where("id", $topic_id)->first();

        //return $topic;
        return view("pages.topic-detail", ["data"=> $topic, "room" => $room]);
    }
}
