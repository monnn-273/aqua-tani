<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
  public function run(): void
  {
    $users = [];
    $faker = Factory::create('id_ID');
    $phoneNumbers = []; // Create an empty array to store generated phone numbers

    while (count($phoneNumbers) < 50) {
      $phoneNumber = $faker->unique()->phoneNumber;

      // Check if the generated phone number already exists
      while (in_array($phoneNumber, $phoneNumbers)) {
        $phoneNumber = $faker->unique()->phoneNumber;
      }

      // Add the phone number to the list
      $phoneNumbers[] = $phoneNumber;
    }

    $users = [];
    foreach ($phoneNumbers as $phoneNumber) {
      $image_name_with_extension = $faker->image('public/user/images', 300, 250, null, true);
      $path_parts = pathinfo($image_name_with_extension);
      $image_name = $path_parts['filename'];
      $image_extension = $path_parts['extension'];

      $users[] = [
        'name'              => $faker->name,
        'email'             => $faker->email,
        'address'           => $faker->address,
        'phone_number'      => $phoneNumber,
        'password'          => bcrypt('rahasia222'),
        'role'              => $faker->numberBetween(1, 3),
        'pfp'               => $image_name_with_extension,
        'email_verified_at' => $faker->dateTime(),
        'created_at'        => $faker->dateTime(),
        'updated_at'        => $faker->dateTime()
      ];
      Storage::move("public/user/images/$image_name_with_extension", "public/user/images/$image_name_with_extension");
    }

    DB::table('users')->insert(array_map(function ($user) use ($image_extension) {
      $user['pfp'] = pathinfo($user['pfp'], PATHINFO_FILENAME) . '.' . $image_extension;
      return $user;
    }, $users));
  }
}
