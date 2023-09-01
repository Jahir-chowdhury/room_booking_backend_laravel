<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Booking;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        {
            // Seed rooms table
            Room::create(['name' => 'Room A']);
            Room::create(['name' => 'Room B']);
            Room::create(['name' => 'Room C']);
            Room::create(['name' => 'Room D']);
            Room::create(['name' => 'Room E']);

            // Seed bookings table
            Booking::create([
                'room_id' => 1,
                'start_time' => now(),
                'end_time' => now()->addHours(2),
            ]);
            Booking::create([
                'room_id' => 2,
                'start_time' => now()->addHours(3),
                'end_time' => now()->addHours(4),
            ]);
        }
    }
}
