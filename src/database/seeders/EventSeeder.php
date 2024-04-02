<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producer = User::where('email', 'producer_2@producer.com')->first();
        Event::create([
            "name" => "Micareta",
            "banner_url" => "teste",
            "user_id" => $producer->id
        ]);

        $producer = User::where('email', 'producer@producer.com')->first();
        Event::create([
            "name" => "Carnaval",
            "banner_url" => "teste",
            "user_id" => $producer->id
        ]);
    }
}
