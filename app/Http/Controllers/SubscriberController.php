<?php

namespace App\Http\Controllers;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

	public function submit(Request $request )
    {

        $rules = [
            'email' => 'unique:subscribers',
            'mobile' => 'unique:subscribers'
        ];

        $data = [
            'email.unique' => 'Please provide unique Email address.',
            'mobile.unique' => 'Please provide unique Phone number.'
        ];

        $validator = Validator::make($request->all(), $rules, $data);

        if( $validator->fails() ) {

            return response()->json($validator->errors()->first());

        } else {

            Subscriber::create($request->all());
            return response()->json('The data was saved!', 200);
        }

    }
}
