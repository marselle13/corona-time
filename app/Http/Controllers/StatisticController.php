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
		$sort = request()->query('sort');
		$order = request()->query('order');
		$worldwide = Statistic::where('name->en', 'worldwide')->first();

		$query = Statistic::query()
			->where("name->$locale", 'LIKE', "%$search%")
			->where('id', '!=', $worldwide->id);

		if ($order && $sort !== 'location') {
			$query->orderBy($sort, $order);
		} elseif ($order && $sort === 'location') {
			$query->orderBy("name->$locale", $order);
		}

		$countries = $query->get();

		$countries->prepend($worldwide);

		return $countries;
	}
}
