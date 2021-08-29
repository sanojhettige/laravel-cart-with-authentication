<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class addProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'price' => rand(100,1000),
                'description' => Str::random(100),
            ]);
        }
    }
}
