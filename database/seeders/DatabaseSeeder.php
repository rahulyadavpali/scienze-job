<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->call(TeamSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(SportsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(SportsRoleSeeder::class);

    }
}
