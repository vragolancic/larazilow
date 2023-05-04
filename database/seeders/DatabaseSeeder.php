<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Nikolic',
             'email' => 'ivica@gmail.com',
         ]);
        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'test@test.com',
        ]);

        Listing::factory(15)->create([
            'by_user_id' => 1
        ]);
    }
}
