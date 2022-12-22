<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "roll_no"=>$this->faker->unique()->randomNumber(7,true),
            "father_name" => $this->faker->name(),
            "father_phone" => $this->faker->phoneNumber,
            "mother_name" => $this->faker->name(),
            "mother_phone" => $this->faker->phoneNumber,
            "sex" => $this->faker->boolean(),               
            "dob"=>$this->faker->date(),
            "address" => $this->faker->address,
            "nationality"=>$this->faker->country,
            "dateregistered"=>$this->faker->date(),
       
        ];
    }
}
