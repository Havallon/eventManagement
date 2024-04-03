<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = Event::where("name","Micareta")->first();
        Section::create([
            "type"=> "Pista",
            "event_id"=> $event->id,
        ]);

        Section::create([
            "type"=> "Camarote",
            "event_id"=> $event->id,
        ]);
    }
}
