<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['name' => 'Cricket','short_name'=>'CR', 'description' => 'cricket'],
            ['name' => 'Australia Football League','short_name'=>'AFL', 'description' => 'Australia Football League'],
            ['name' => 'Football','short_name'=>'Football', 'description' => 'Football'],
            ['name' => 'Rugby League','short_name'=>'RL', 'description' => 'Rugby League'],
            ['name' => 'Rugby U or Netball','short_name'=>'RUN', 'description' => 'Rugby U or Netball'],

        ];

        foreach ($items as $item) {
            \App\Sports::create($item);
        }
    }
}
