<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class SportsRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id'=>1,'sports_id'=>1,'name' => 'All Rounder'],
            ['id'=>2,'sports_id'=>1,'name' => 'Batsman'],
            ['id'=>3,'sports_id'=>1,'name' => 'Bowler'],

        ];

        foreach ($items as $item) {
            \App\SportsRole::create($item);
        }
    }
}
