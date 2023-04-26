<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\View\View;

class StatisticController extends Controller
{
	public function worldwidePage(): View
	{
		return view('landing.worldwide', ['worldwide' => Statistic::all()->last()]);
	}

	public function countryPage(): View
	{
		$worldwide = Statistic::where('name->en', 'worldwide')->first();
		return view('landing.country', ['countries' => Statistic::countriesFilter()->get()->prepend($worldwide)]);
	}
}
