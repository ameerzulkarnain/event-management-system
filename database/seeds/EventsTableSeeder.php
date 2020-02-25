<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Events;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        Events::create([
	            'name' => $faker->catchPhrase,
	        ]);
	    }
    }
}
