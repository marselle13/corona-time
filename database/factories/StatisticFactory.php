<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statstic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$fakerKa = \Faker\Factory::create('ka_GE');

		return  [
			'code' => fake()->countryCode(),
			'name' => ['en' => fake()->unique()->country(),
				'ka'           => $fakerKa->unique()->country()],
			'country'   => fn ($attributes) => $attributes['name']['en'],
			'confirmed' => fake()->numberBetween(0, 200000),
			'recovered' => fake()->numberBetween(0, 200000),
			'critical'  => fake()->numberBetween(0, 200000),
			'deaths'    => fake()->numberBetween(0, 200000),
		];
	}
}
