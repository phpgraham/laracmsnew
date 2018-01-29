<?php

namespace App\Interfaces;

use App\Menu;

interface MenuRepositoryInterface
{
  public function listMenu(int $parent = 'parent_id', string $order = 'order', string $sort = 'desc');
}
