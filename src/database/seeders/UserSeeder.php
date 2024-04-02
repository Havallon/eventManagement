<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "admin",
            "email"=> "admin@admin.com",
            "document" => "000.000.000-00",
            "phone_number" => "75999999999",
            "password"=> "102030",
            "role"=> UserRole::admin
        ]);

        User::create([
            "name"=> "producer",
            "email"=> "producer@producer.com",
            "document" => "000.000.000-01",
            "phone_number" => "75999999999",
            "password"=> "102030",
            "role"=> UserRole::producer
        ]);

        User::create([
            "name"=> "producer",
            "email"=> "producer_2@producer.com",
            "document" => "000.000.000-11",
            "phone_number" => "75999999999",
            "password"=> "102030",
            "role"=> UserRole::producer
        ]);

        User::create([
            "name"=> "customer",
            "email"=> "customer@customer.com",
            "document" => "000.000.000-02",
            "phone_number" => "75999999999",
            "password"=> "102030",
            "role"=> UserRole::customer
        ]);
    }
}
