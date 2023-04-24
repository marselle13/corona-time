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
		return view('landing.country', ['countries' => Statistic::all()]);
	}
}
