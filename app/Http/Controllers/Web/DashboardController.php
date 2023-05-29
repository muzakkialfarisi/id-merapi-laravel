<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('dashboard/index');
    }

    public function LogoutProcess()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
