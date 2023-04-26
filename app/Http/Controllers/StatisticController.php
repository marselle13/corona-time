<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class StatisticController extends Controller
{
	public function worldwidePage(): View
	{
		return view('landing.worldwide', ['worldwide' => Statistic::all()->last()]);
	}

	public function countryPage(): View
	{
		return view('landing.country', ['countries' => $this->countriesFilter()]);
	}

	public function countriesFilter(): Collection
	{
		$locale = app()->getLocale();
		$search = ucfirst(request()->query('search'));

		$worldwide = Statistic::where('name->en', 'worldwide')->first();

		$query = Statistic::query()
			->where("name->$locale", 'LIKE', "%$search%")
			->where('id', '!=', $worldwide->id);

		if (request()->query('confirmed')) {
			$query->orderBy('confirmed', request()->query('confirmed'));
		} elseif (request()->query('recovered')) {
			$query->orderBy('recovered', request()->query('recovered'));
		} elseif (request()->query('deaths')) {
			$query->orderBy('deaths', request()->query('deaths'));
		} elseif (request()->query('location')) {
			$query->orderBy("name->$locale", request()->query('location'));
		}

		$countries = $query->get();

		$countries->prepend($worldwide);

		return $countries;
	}
}
