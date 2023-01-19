<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['name' => 'Australian Capital Territory','short_name'=>'ACT', 'description' => 'Australian Capital Territory'],
            ['name' => 'New South Wales','short_name'=>'NSW', 'description' => 'New South Wales'],
            ['name' => 'Northern Territory','short_name'=>'NT', 'description' => 'Northern Territory'],
            ['name' => 'Queensland','short_name'=>'QLD', 'description' => 'Queensland'],
            ['name' => 'South Australia','short_name'=>'SA', 'description' => 'South Australia'],
            ['name' => 'Tasmania','short_name'=>'TAS', 'description' => 'Tasmania'],
            ['name' => 'Victoria is a state in southeastern Australia','short_name'=>'VIC', 'description' => 'Victoria is a state in southeastern Australia'],
            ['name' => 'Western Australia','short_name'=>'WA', 'description' => 'Western Australia'],

        ];

        foreach ($items as $item) {
            \App\States::create($item);
        }
    }
}
