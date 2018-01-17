<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

  protected $table = 'menus';
  protected $fillable = ['title','parent_id'];

  public function parent() {

    return $this->hasOne('App\Menus', 'id', 'parent_id')->orderBy('menu_order');

  }

  public function children() {

    return $this->hasMany('App\Menus', 'parent_id', 'id')->orderBy('menu_order');

  }

  public static function tree() {

    return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('menu_order')->get();

  }

 }

