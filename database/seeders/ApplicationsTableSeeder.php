<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        $job_ids = Job::pluck("id")->toArray();
        $applicant_ids = User::where("role", 3)->pluck("id")->toArray();
        $app_status = ["processed", "rejected", "accepted"];
        $applications = [];

        foreach (range(1, 50) as $i) {
            $applications[] = [
                'job_id' => $faker->randomElement($job_ids),
                'applicant_id' => $faker->randomElement($applicant_ids),
                'application_status' => $faker->randomElement($app_status),
            ];
        }

        DB::table("applications")->insert($applications);
    }
}
