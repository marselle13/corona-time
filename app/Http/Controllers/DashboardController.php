<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
	public function worldwidePage()
	{
		return view('landing.worldwide', ['username' => auth()->user()->username]);
	}
}
