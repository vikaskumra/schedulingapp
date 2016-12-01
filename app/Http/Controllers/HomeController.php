<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;  
use App\CompanyTypes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_type = CompanyTypes::all();
		return view('users.signup')->with(['company_type'=>$company_type]);
    }
}
