<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{

    protected $model = Appointment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'patient_user_id' => User::factory(),
            'start_time' => $this->faker->datetime(),
            'end_time' => $this->faker->datetime()
        ];
    }
}
