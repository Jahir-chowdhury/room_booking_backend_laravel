<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')->get();

        $formattedBookings = $bookings->map(function ($booking) {
            return [
                'id' => $booking->id,
                'room' => [
                    'id' => $booking->room->id,
                    'name' => $booking->room->name,
                ],
                'start_time' => $booking->start_time,
                'end_time' => $booking->end_time,
            ];
        });

        return response()->json(['data' => $formattedBookings]);
    }

    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->room_id = $request->input('room_id');
        $booking->start_time = $request->input('start_time');
        $booking->end_time = $request->input('end_time');

        $conflictingBookings = Booking::where('room_id', $booking->room_id)
        ->where(function ($query) use ($booking) {
            $query
            ->whereBetween('start_time', [$booking->start_time,$booking->end_time])
            ->orWhereBetween('end_time', [$booking->start_time,$booking->end_time]);
        })
        ->get();

        if ($conflictingBookings->count() > 0) {
            return response()->json(['data' => $conflictingBookings]);
        }

        $booking->save();
        return response()->json(['message' => 'Booking created successfully'], 201);
    }
}
