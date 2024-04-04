<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = Section::where("type","Pista")->first();
        Batch::create([
            "order"=> 1,
            "expiration_date" => Carbon::today()->addMonth()->format("Y-m-d"),
            "section_id" => $section->id,
        ]);
    }
}
