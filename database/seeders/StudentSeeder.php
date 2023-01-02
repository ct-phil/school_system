<?php

namespace Database\Seeders;

use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        // Student::factory()->count(50)->create();

        $z = 10;


        for ($i = 0; $i <= $z; $i++) {

            $student = new User();

            $student->name = $faker->name;
            $student->email = $faker->unique()->safeEmail;
            $student->account_type = 3;
            $student->password = Hash::make('password');
            $student->save();

            $student->studentDetail()->create([
                'reg_no' => $faker->unique()->randomNumber(7, true),
                'id_number' => $faker->unique()->randomNumber(7, true),
            ]);
        }
    }
}
