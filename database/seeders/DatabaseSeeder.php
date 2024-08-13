<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Admin',
            'role' => 'admin'
        ]);
        Account::create([
            'username' => 'author',
            'password' => bcrypt('author'),
            'name' => 'Author',
            'role' => 'author'
        ]);
    }
}
