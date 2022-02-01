<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AirPlaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makers = ['Boeing', 'Airbus', 'Embraer', 'Bombardier', 'Comac', 'MAC',
            'UAC', 'Aviastar-SP'];
        $names = ['Hawker Hurricane', 'U-2', 'B-52', 'F-16', 'MiG-21',
            'A350', '747', '767'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('airplanes')->insert([
                'name' => $names[random_int(0, 7)],
                'maker' => $makers[random_int(0, 7)],
                'seats' => random_int(55, 250),
            ]);
        }
    }
}
