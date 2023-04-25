<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class StatisticController extends Controller
{
	public function worldwidePage()
	{
		return view('landing.worldwide', ['worldwide' => Statistic::all()->last()]);
	}

	public function countryPage()
	{
		return view('landing.country', ['countries' => $this->countriesFilter()]);
	}

	public function countriesFilter()
	{
		$locale = app()->getLocale();
		$search = ucfirst(request()->query('search'));

		$query = Statistic::query()
			->where("name->$locale", 'LIKE', "%$search%");

		if (request()->query('confirmed')) {
			$query->orderBy('confirmed', request()->query('confirmed'));
		} elseif (request()->query('recovered')) {
			$query->orderBy('recovered', request()->query('recovered'));
		} elseif (request()->query('deaths')) {
			$query->orderBy('deaths', request()->query('deaths'));
		} elseif (request()->query('location')) {
			$query->orderBy("name->$locale", request()->query('location'));
		}

		return $query->get();
	}
}
