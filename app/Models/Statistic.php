<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory,HasTranslations;

	public $translatable = ['name'];

	protected $guarded = [];

	public function scopeCountriesFilter($query): void
	{
		$locale = app()->getLocale();
		$search = ucfirst(request()->query('search'));
		$sort = request()->query('sort');
		$order = request()->query('order');
		$worldwide = $this->where('name->en', 'worldwide')->first();

		$query->where("name->$locale", 'LIKE', "%$search%")
			->where('id', '!=', $worldwide?->id);

		if ($order && $sort !== 'location') {
			$query->orderBy($sort, $order);
		} elseif ($order && $sort === 'location') {
			$query->orderBy("name->$locale", $order);
		}
	}
}
