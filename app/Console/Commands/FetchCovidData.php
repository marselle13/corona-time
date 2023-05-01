<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCovidData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:covid-data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'fetch covid data from API';

	/**
	 * Execute the console command.
	 */
	public function handle(): void
	{
		$response = Http::get('https://devtest.ge/countries');
		$countries = $response->json();

		$data = collect($countries)->map(function ($country) {
			$response = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			]);
			$statistics = $response->json();
			return array_merge($country, $statistics);
		});

		collect($data)->each(
			function ($item) {
				Statistic::updateOrCreate(
					['code'    => $item['code'], 'country' => $item['country'], 'created_at' => $item['created_at']],
					[
						'name'       => $item['name'],
						'confirmed'  => $item['confirmed'],
						'recovered'  => $item['recovered'],
						'critical'   => $item['critical'],
						'deaths'     => $item['deaths'],
						'updated_at' => $item['updated_at'],
					]
				);
			}
		);
		Statistic::updateOrCreate(
			['code'    => 'WW', 'country' => 'worldwide'],
			[
				'name'      => ['en' => 'worldwide', 'ka' => 'მსოფლიო'],
				'confirmed' => collect($data)->sum('confirmed'),
				'recovered' => collect($data)->sum('recovered'),
				'critical'  => collect($data)->sum('critical'),
				'deaths'    => collect($data)->sum('deaths'), ]
		);
	}
}
