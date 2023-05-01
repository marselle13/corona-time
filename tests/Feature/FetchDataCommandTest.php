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
		// Set up fake data for countries endpoint
		$fakeCountries = [
			['code' => 'GE', 'name' => ['en' => 'Georgia', 'ka' => 'საქართველო']],
		];
		Http::fake([
			'https://devtest.ge/countries' => Http::response($fakeCountries, 200),
		]);

		Http::post('https://devtest.ge/get-countries-statistics', ['code' => 'GE']);

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
