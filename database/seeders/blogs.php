<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;
class blogs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker=Faker::create();
        $blogs = new blogs;
        $blogs->title= $faker->paragraph(1);
        $blogs->body= $faker->paragraph(5);
        $blogs->customer_id= Customer::all()->random()->id;
    }
}
