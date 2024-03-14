<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::create([
            'name' => 'Shift Pagi',
            'start_hour' => "08:00:00",
            'end_hour' => '12:30:00'
        ]);

        Shift::create([
            'name' => 'Shift Siang',
            'start_hour' => "13:00:00",
            'end_hour' => '17:00:00'
        ]);

        Shift::create([
            'name' => 'Full Time',
            'start_hour' => "08:00:00",
            'end_hour' => '16:00:00'
        ]);
    }
}
