<?php
namespace App\Repositories;

use App\BaseRepository;
use App\Interfaces\MenuRepositoryInterface;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
  /**
   * MenuRepository constructor.
   * @param Menu $menu
   */
  public function __construct(Menu $menu)
  {
      parent::__construct($menu);
      $this->model = $menu;
  }

  /**
   * List all the menu items
   *
   * @param int $parent_id
   * @param string $order
   * @param string $sort
   * @return \Illuminate\Support\Collection
   */
  public function listMenu(int $parent = 'parent_id', string $order = 'order', string $sort = 'desc')
  {
      return $this->model->where($parent, 0)->orderBy($order)->get();
  }

  /**
   * @return mixed
   */
  public function findParentCategory()
  {
      return $this->model->parent;
  }

  /**
   * @return mixed
   */
  public function findChildren()
  {
      return $this->model->children;
  }
}
