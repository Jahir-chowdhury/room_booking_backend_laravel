<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        $formattedRooms = $rooms->map(function ($room) {
            return [
                'id' => $room->id,
                'name' => $room->name,
            ];
        });

        return response()->json(['data' => $formattedRooms]);
    }


    public function store(Request $request)
    {
        $room = new Room();
        $room->name = $request->input('name');
        $room->save();
        return response()->json(['message' => 'Room created successfully']);
    }

}