<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\DbModel;
use Session;


class DbController extends Controller
{
	/**
	 * to Display all properties
	 *
	 * @return Response
	 */
	public function dbtableslist()
	{
	   	return view('admin.db.db');	
	}
}
