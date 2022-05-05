<?php

namespace Database\Seeders;

use Database\Seeders\DatabaseSeeder;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use App\Models\Category;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Daster'
        ]);
        DB::table('categories')->insert([
            'name' => 'Baju'
        ]);
        DB::table('categories')->insert([
            'name' => 'Celana'
        ]);
        DB::table('categories')->insert([
            'name' => 'Jeans'
        ]);
        DB::table('categories')->insert([
            'name' => 'Jaket'
        ]);
        DB::table('users')->insert([
            'name' => 'reusmana sujani',
            'email' => 'reusmanasujani@gmail.com',
            'password' => bcrypt('12345678'),
            'address' => 'Sukabumi',
            'phone' => '085210780093',
        ]);
    }
}
