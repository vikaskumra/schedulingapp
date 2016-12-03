<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;    
use App\User;  
use App\Company;
use Auth; 
use Illuminate\Support\Facades\Input;


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
    
}
