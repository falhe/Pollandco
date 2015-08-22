<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\User;
use Illuminate\Support\Facades\Input;

class RestController extends Controller {

/**
*
* Recherche les utilisateurs
* @params q=id or q=name
*
**/

	public function searchusers(Request $request)
	{
		if(Input::exists('q')){
			$users = User::with('role')
						->where('id', Input::get('q') )
						->orWhere('name', 'like', '%' . Input::get('q') . '%')
						->get();
			return $users;
		}

	}

}
