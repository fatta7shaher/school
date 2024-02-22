<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'A', 'ar' => 'ا'],
            ['en' => 'B', 'ar' => 'ب'],
            ['en' => 'T', 'ar' => 'ت'],
        ];

        foreach ($Sections as $section) {
            Section::create([
                'name_section' => $section,
                'status' => 1,
                'grade_id' => Grade::all()->unique()->random()->id,
                'class_id' => ClassRoom::all()->unique()->random()->id
            ]);
        }
    }
}
