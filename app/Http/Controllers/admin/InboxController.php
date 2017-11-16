<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Inbox;
use Session;



class InboxController extends Controller
{
	/**
	 * to Display all properties
	 *
	 * @return Response
	 */
	public function inboxlist()
	{
	   	return view('admin.inbox.inbox');	
	}
}