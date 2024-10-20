<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Subject;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@mail.com',
            'password' => bcrypt('secret'),
        ]);

        Subject::factory(100)->create();
        Book::factory(100)->create();
        Author::factory(50)->create();
    }
}
