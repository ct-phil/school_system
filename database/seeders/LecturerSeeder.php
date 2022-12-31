<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\LecturerDetail;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        // Lecturer::factory()->count(50)->create();

        $z = 50;


        for ($i = 0; $i <= $z; $i++) {

            $lecturer = new User();

            $lecturer->name =$faker->name;
            $lecturer->email = $faker->unique()->safeEmail;
            $lecturer->account_type = 2;
            $lecturer->password = Hash::make('password');
            $lecturer->save();

            $lecturer->lecturerDetail()->create([
               
                'id_number' => $faker->unique()->randomNumber(7, true),
            ]);
        }

    }
}
