<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchDataCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_data_fetching_in_database(): void
	{
		$fakeCountries = [
			['code' => 'GE', 'name' => ['en' => 'Georgia', 'ka' => 'საქართველო']],
		];

		$fakeStatistics = [
			'country'    => 'Georgia',
			'confirmed'  => 1,
			'recovered'  => 1,
			'critical'   => 1,
			'deaths'     => 1,
			'created_at' => now(),
			'updated_at' => now(),
		];

		Http::fake([
			'https://devtest.ge/countries'                => Http::response($fakeCountries, 200),
			'https://devtest.ge/get-countries-statistics' => Http::response($fakeStatistics, 200),
		]);

		$this->artisan('fetch:covid-data');

		$this->assertDatabaseHas('statistics', [
			'code'    => 'GE',
			'country' => 'Georgia',
		]);
		$this->assertDatabaseHas('statistics', [
			'code'    => 'WW',
			'country' => 'worldwide',
		]);
	}
}
