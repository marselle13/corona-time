<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchDataCommandTest extends TestCase
{
	use RefreshDatabase;

	public function test_data_fetching_in_database(): void
	{
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
