<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\UserMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menuList = (new UserMenu())->tree();
        return view('index')->with('menulist', $menuList);
    }
}
