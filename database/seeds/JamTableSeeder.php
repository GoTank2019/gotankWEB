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
    	// $jam = factory(App\Jam::class, 10)->create();
        DB::table('jams')->insert([
            'jam'      => '06:00 - 09:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
