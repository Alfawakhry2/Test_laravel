<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //call DB direct
        DB::table('categories')->insert([
            "name" => Str::random(5),
            "desc" => "desc cat"
        ]);

        //call the model
        Category::create([
            "name" => Str::random(5),
            "desc" => "desc cat dd"

        ]);
    }
}
