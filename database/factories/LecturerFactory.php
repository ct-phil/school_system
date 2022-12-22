<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lecturer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class LecturerFactory extends Factory
{
    protected $model = Lecturer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "first_name" => $this->faker->name(),
            "middle_name" => $this->faker->name(),
            "surname" => $this->faker->name(),
            "sex" => $this->faker->boolean(),               
            "dob"=>$this->faker->date(),
            "address" => $this->faker->address,
            "nationality"=>$this->faker->country,
            "dateregistered"=>$this->faker->date(),
       
        ];
    }
}
