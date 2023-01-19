<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['name' => 'Australia','short_name'=>'AUS'],

        ];

        foreach ($items as $item) {
            \App\Country::create($item);
        }
    }
}
