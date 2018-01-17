<?php

namespace App\Http\Controllers\Frontend\Menu;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menus;

/**
 * Class DashboardController.
 */
class MenuController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menus = Menus::where('parent_id', 0)->orderBy('order')->get();
        return view('frontend.includes.sidebar', compact('menus'));
    }

}
