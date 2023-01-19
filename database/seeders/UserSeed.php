<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            [
                'id' => 1, 
                'name' => 'Admin', 
                'username'=>'admin',
                'email' => 'admin@admin.com', 
                'password' => Hash::make(12345678), 
                'role_id' => 1,  
                'remember_token' => '',
            ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
