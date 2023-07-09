<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $skills = [];

        foreach (range(1, 25) as $i) {

            $skills[] = [
                "skill_name" => $faker->words($nb = 3, $asText = true),
            ];
        }

        DB::table("skills")->insert($skills);
    }
}
