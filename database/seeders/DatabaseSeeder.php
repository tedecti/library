<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
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
        DB::table('roles')->insert([
            'name' => 'Пользователь',
        ]);

        DB::table('roles')->insert([
            'name' => 'Администратор',
        ]);

        User::create([
            'fio' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 1,
        ]);


        DB::table('authors')->insert([
            'fio' => 'Джоан Роулинг',
        ]);

        DB::table('categories')->insert([
            'name' => 'Фантастика',
        ]);

    }
}
