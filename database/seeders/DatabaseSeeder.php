<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            CategorySeeder::class,
        ]);
        $array[]=[
            'name'=>'t',
            'email'=>'147thiet@gmail.com',
            'avatar'=>'user-1681155419.jpg',
            'password'=> Hash::make(123456),
            'role'=>3

        ];
        DB::table('users')->insert($array);


    }
}
