<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Jam;
use Carbon\Carbon;

class JamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jams')->insert([
        [
            'jam' => '01:00',
            'value' => 1
        ],
        [
            'jam' => '02:00',
            'value' => 2
        ],
        [
            'jam' => '03:00',
            'value' => 3
        ],
        [
            'jam' => '04:00',
            'value' => 4
        ],
        [
            'jam' => '05:00',
            'value' => 5
        ],
        [
            'jam' => '06:00',
            'value' => 6
        ],
        [
            'jam' => '07:00',
            'value' => 7
        ],
        [
            'jam' => '08:00',
            'value' => 8
        ],
        [
            'jam' => '09:00',
            'value' => 9
        ],
        [
            'jam' => '10:00',
            'value' => 10
        ],
        [
            'jam' => '11:00',
            'value' => 11
        ],
        [
            'jam' => '12:00',
            'value' => 12
        ],
        [
            'jam' => '13:00',
            'value' => 10
        ],
        [
            'jam' => '14:00',
            'value' => 14
        ],
        [
            'jam' => '15:00',
            'value' => 15
        ],
        [
            'jam' => '16:00',
            'value' => 16
        ],
        [
            'jam' => '17:00',
            'value' => 17
        ],
        [
            'jam' => '18:00',
            'value' => 18
        ],
        [
            'jam' => '19:00',
            'value' => 19
        ],
        [
            'jam' => '20:00',
            'value' => 20
        ],
        [
            'jam' => '21:00',
            'value' => 21
        ],
        [
            'jam' => '22:00',
            'value' => 22
        ],
        [
            'jam' => '23:00',
            'value' => 23
        ],
        [
            'jam' => '24:00',
            'value' => 24
        ]

    ]);
    }
}
