<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\MenuRepository;
use App\Repositories\Interfaces\MenuRepositoryInterface;
use App\Http\Controllers\Controller;


/**
 * Class DashboardController.
 */
class MenuController extends Controller
{
  private $menuRepo;

  public function __construct(MenuRepositoryInterface $menuRepository)
  {
    $this->menuRepo = $menuRepository;
  }
  /**
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $menus = $this->menuRepo->listMenu(0);
    return view('frontend.includes.sidebar', compact('menus'));
  }

}
