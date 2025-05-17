<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['house', 'department', 'land', 'commercial_ground'];
        $countryCodes = ['US', 'MX', 'FR', 'DE'];

        return [
            'name' => $faker->words(2, true),
            'real_state_type' => $type = $faker->randomElement($types),
            'street' => $faker->streetName,
            'external_number' => $faker->bothify('##?-?#'),
            'internal_number' => in_array($type, ['department', 'commercial_ground']) ? $faker->bothify('A-##') : null,
            'neighborhood' => $faker->citySuffix,
            'city' => $faker->city,
            'country' => $faker->randomElement($countryCodes),
            'rooms' => $faker->numberBetween(1, 6),
            'bathrooms' => in_array($type, ['land', 'commercial_ground']) ? 0 : $faker->randomFloat(1, 1, 4),
            'comments' => $faker->optional()->text(100),
        ];
    }
}
