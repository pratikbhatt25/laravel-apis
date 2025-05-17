<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    public function definition(): array
    {
        $types = ['house', 'department', 'land', 'commercial_ground'];
        $countryCodes = ['US', 'MX', 'FR', 'DE'];

        $type = $this->faker->randomElement($types);

        return [
            'name' => $this->faker->words(2, true),
            'real_state_type' => $type,
            'street' => $this->faker->streetName,
            'external_number' => $this->faker->bothify('##?-?#'),
            'internal_number' => in_array($type, ['department', 'commercial_ground']) ? $this->faker->bothify('A-##') : null,
            'neighborhood' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'country' => $this->faker->randomElement($countryCodes),
            'rooms' => $this->faker->numberBetween(1, 6),
            'bathrooms' => in_array($type, ['land', 'commercial_ground']) ? 0 : $this->faker->randomFloat(1, 1, 4),
            'comments' => $this->faker->optional()->text(100),
        ];
    }
}
