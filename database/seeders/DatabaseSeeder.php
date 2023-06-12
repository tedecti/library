<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fio' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123123'),
            'role' => ('1'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('authors')->insert([
            'fio' => 'Джоан Роулинг',
        ]);

        DB::table('categories')->insert([
            'name' => 'Фантастика',
        ]);
    }
}
