<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Abrites',
            'email' => 'astankov@abrites.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('abrites1234')
        ]);

        User::factory(40)->create();
    }
}
