<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function index()
	{
		return View::make('main')
				->with('title', 'Dashboard')
				->with('user', Auth::user());
	}

	public function templateHandler($tmpl)
	{
		return View::make('templates/'. $tmpl);
	}

}
