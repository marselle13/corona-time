<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
	public function setLanguage(Request $request): RedirectResponse
	{
		app()->setLocale($request->input('locale'));
		session()->put('locale', $request->input('locale'));
		return redirect()->back();
	}
}
