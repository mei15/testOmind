<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Penjaga;
use App\Models\Tempat;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (Auth::User()->userable_type == 'App\Models\Admin') {
            return $this->adminDashboard();
        }else{
        
            return $this->penjagaDashboard();
        }
    }

    protected function adminDashboard()
    {
        $user = Auth::user();
        return view('dashboard.admin', compact( 'user'));
    }

    protected function penjagaDashboard()
    {
        $user = Auth::user();
        return view('dashboard.penjaga', compact('user'));
    }

    
}
