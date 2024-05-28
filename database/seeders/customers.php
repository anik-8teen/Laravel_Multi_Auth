<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;
class customers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $customers = new Customer;
        $customers->customerName = $faker->name;
        $customers->email = $faker->email;
        $customers->phone = $faker->phoneNumber;
        $customers->dob = $faker->date;
        $customers->password = $faker->password;
    }
}
