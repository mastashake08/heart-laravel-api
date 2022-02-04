<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'account_type' => 'Mental Health',
            // 'address' => $request->address,
            'mental_health_license_type' => 'asbsd',
            'mental_health_license_number' => '11111',
            'mental_health_license_state' => $this->faker->state,
            'profile_photo_path' => 'https://via.placeholder.com/600/d32776',
            'client_focus_age' => "Toddler",
            'primary_language' => 'Engligh',
            'secondary_language' => 'Japanese',
            'bio' => $this->faker->sentence(490),
            'covid_statement' => $this->faker->sentence(490),
            'teleheath_services' => $this->faker->boolean(),
            'practice_address_line1' => $this->faker->streetName,
            'practice_address_line2' => $this->faker->secondaryAddress,
            'practice_address_city' => $this->faker->city,
            'practice_address_state' => $this->faker->state,
            'practice_address_zip' => $this->faker->postcode
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
