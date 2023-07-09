<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobsTableSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [];
        $faker = Factory::create('id_ID');
        $categories = ["pertanian", "perikanan"];
        $gender = ["perempuan", "laki-laki", "tidak ditentukan"];
        $status = ["open", "closed"];
        $type = ["part-time", "full-time"];
        $recruiter = User::where("role", 2)->pluck('id')->toArray();

        foreach (range(1, 50) as $i) {
            $image_name_with_extension = $faker->image('public/user/images/job', 325, 250, null, true);
            $path_parts = pathinfo($image_name_with_extension);
            $image_name = $path_parts['filename'];
            $image_extension = $path_parts['extension'];

            $jobs[] = [
                'job_title'         => $faker->words($nb = 3, $asText = true),
                'location'          => $faker->address,
                'job_description'   => $faker->text($maxNbChars = 200),
                'gender'            => $faker->randomElement($gender),
                'job_type'          => $faker->randomElement($type),
                'responsibilities'  => $faker->text($maxNbChars = 200),
                'experience'        => $faker->text($maxNbChars = 200),
                'benefits'          => $faker->text($maxNbChars = 200),
                'vacancy'           => $faker->numberBetween(20, 100),
                'image'             => $image_name_with_extension,
                'salary'            => 'Rp2.500.000 - Rp3.000.000/bulan',
                'job_category'      => $faker->randomElement($categories),
                'job_owner_id'      => $faker->randomElement($recruiter),
                'job_status'        => $faker->randomElement($status),
                'deadline'        => $faker->dateTime(),
                'created_at'        => $faker->dateTime(),
                'updated_at'        => $faker->dateTime()
            ];
            Storage::move("public/user/images/job/$image_name_with_extension", "public/user/images/job/$image_name_with_extension");
        }

        DB::table("jobs")->insert(array_map(function ($job) use ($image_extension) {
            $job['image'] = pathinfo($job['image'], PATHINFO_FILENAME) . '.' . $image_extension;
            return $job;
        }, $jobs));
    }
}
