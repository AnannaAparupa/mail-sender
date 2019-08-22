<?php

namespace App\Http\Controllers;

use App\EmailSend;
use App\User;
use Illuminate\Http\Request;

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
        $total_user = User::count();
        $total_mail = EmailSend::where('user_id', auth()->user()->id)->count();


        return view('admin.home', compact('total_user', 'total_mail'));
    }
}
