<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

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
	public function handle()
	{
		$client = new Client([
			'base_uri' => 'https://devtest.ge/',
		]);

		$responseGet = $client->request('GET', '/countries');
		$countries = json_decode($responseGet->getBody(), true);

		$data = collect($countries)->map(function ($country) use ($client) {
			$responsePost = $client->request('POST', '/get-country-statistics', [
				'json' => [
					'code' => $country['code'],
				],
			]);

			$statistics = json_decode($responsePost->getBody(), true);
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
