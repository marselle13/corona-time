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
		$query = ucfirst(request()->input('search'));
		$countries = Statistic::query()
			->where('name->en', 'LIKE', "%$query%")
			->orWhere('name->ka', 'LIKE', "%$query%")
			->get();
		return view('landing.country', ['countries' => $countries]);
	}
}
