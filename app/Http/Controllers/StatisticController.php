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
		$countries = $worldwide ? Statistic::countriesFilter()->get()->prepend($worldwide) : Statistic::countriesFilter()->get();
		return view('landing.country', ['countries' => $countries]);
	}
}
