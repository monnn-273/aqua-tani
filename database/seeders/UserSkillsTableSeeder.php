<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class UserSkillsTableSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $user_ids = User::where("role", 3)->pluck("id")->toArray();
        $skill_ids = Skill::pluck("id")->toArray();
        $user_skills = [];

        foreach (range(1, 100) as $i) {
            $user_skills[] = [
                "user_id" => $faker->randomElement($user_ids),
                "skill_id" => $faker->randomElement($skill_ids),
            ];
        }

        DB::table("user_skills")->insert($user_skills);
    }
}
