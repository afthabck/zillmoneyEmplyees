<?php

namespace Database\Seeders;

use App\Models\Employees;
use App\Models\Languages;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        Languages::create(['language_name' => 'English']);
        Languages::create(['language_name' => 'Spanish']);
        Languages::create(['language_name' => 'French']);
        Languages::create(['language_name' => 'German']);
        Employees::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'willing_to_work' => 'Yes',
            // 'languages_known' => 'English, Spanish',/
        ]);
    }
}
