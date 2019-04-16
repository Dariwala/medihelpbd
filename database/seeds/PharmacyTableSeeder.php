<?php

use Illuminate\Database\Seeder;

class PharmacyTableSeeder extends Seeder
{
    
    public function run()
    {
        $data = Faker\Factory::create();

		foreach(range(1,10) as $index)
		{
		    DB::table('pharmacy')->insert([
		        'pharmacy_name' => str_random(10),
		        'b_pharmacy_name' => str_random(10),
		        'pharmacy_subname' => str_random(10),
		        'b_pharmacy_subname' => str_random(10),
		        'pharmacy_description' => str_random(10),
		        'b_pharmacy_description' => str_random(10),
		        'district_id' => $data->numberBetween(10,13),
		        'subdistrict_id' => $data->numberBetween(1,6),
		        'created_at' => $data->dateTime($max = 'NOW'),
		        'updated_at' => $data->dateTime($max = 'NOW'),
		    ]);
		}
	}
}
