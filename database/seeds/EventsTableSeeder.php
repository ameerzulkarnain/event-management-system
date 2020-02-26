<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Event;

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
	        Event::create([
                'name' => $faker->catchPhrase,
                'location' => $faker->city,
                'date' => $faker->date($format = 'Y-m-d', $min = 'now'),
	        ]);
	    }
    }
}
