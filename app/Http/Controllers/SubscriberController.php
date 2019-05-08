<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * Class SubscriberController
 * @package App\Http\Controllers
 */
class SubscriberController extends Controller
{

	/** Main Page
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('welcome');
	}
}
