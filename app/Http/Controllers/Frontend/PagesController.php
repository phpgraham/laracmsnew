<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        //dd($pages);
        return view('frontend.pages.index', compact('pages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $page)
    {
        return view('frontend.pages.show', compact('page'));
    }

}
