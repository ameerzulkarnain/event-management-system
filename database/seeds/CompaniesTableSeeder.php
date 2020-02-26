<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
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
	        Company::create([
	            'name' => $faker->company,
	        ]);
	    }
    }
}
