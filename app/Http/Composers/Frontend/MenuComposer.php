<?php

namespace App\Http\Composers\Frontend;

use Illuminate\View\View;
use App\Menus;

class MenuComposer
{
    public $menus = [];
    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('menus', \App\Menus::where('parent_id', 0)->orderBy('menu_order')->get());

    }
}
