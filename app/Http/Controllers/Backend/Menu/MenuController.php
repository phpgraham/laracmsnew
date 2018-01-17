<?php

namespace App\Http\Controllers\Backend\Menu;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menus;
use App\Post;
/**
 * Class DashboardController.
 */
class MenuController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($parent_id)
    {
        $menus = Menus::where('parent_id', $parent_id)->orderBy('menu_order')->get();

        $parent_title['title'] = Menus::where('id', $parent_id)->pluck('title');
        $parent_title['title'] = 'test';
        return view('backend.menu.index', compact('menus','parent_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id)
    {
        return view('backend.menu.create', ['parent_id' => $parent_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'parent_id' => 'required'
        ]);

        Menus::create($request->all());

        session()->flash('status', 'Menu Item Created');
        return redirect(route('admin.menu', ['parent_id' => $request->parent_id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menus::find($id);
        return view('backend.menu.edit',compact('menu'));
    }

    /**
     * Editing the order of menu item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($parent_id, $position, $direction)
    {
        // reorder array function
        // $a array to be sorted
        // $oldpos - current position in array
        // $newpost - new position (+/- 1)
        function array_move(&$a, $parent_id, $oldpos, $newpos) {
            if ($oldpos==$newpos) {return;}
            array_splice($a,max($newpos,0),0,array_splice($a,max($oldpos,0),1));
        }
        //current order
        $menu_order = Menus::where('parent_id', $parent_id)->orderBy('menu_order')->pluck('id')->toArray();

        //pass position and direction
        if($direction=='up'){
            array_move($menu_order,$parent_id,$position,$position-1);
        }
        if($direction=='down'){
            array_move($menu_order,$parent_id,$position,$position+1);
        }
        //reorder all positions in database
        foreach ($menu_order as $key => $menu) {
            DB::table('menus')
              ->where('id', $menu)
              ->update(['menu_order' => $key]);
        }
        session()->flash('status', 'Menu Item moved '.$direction);
        return redirect(route('admin.menu', ['parent_id' => $parent_id]));
    }

    /**
     * Update visible status of menu item
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $menu = Menus::select('id','active','parent_id')->whereId($id)->first();
        if($menu->active == 1)
        {
            $menu->active = 0;
        } else {
            $menu->active = 1;
        }
        $menu->update();

        session()->flash('status', 'Menu Item status updated');
        return redirect(route('admin.menu', ['parent_id' => $menu->parent_id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $parent_id)
    {

        $this->validate(request(), [
            'title' => 'required'
        ]);

        Menus::find($id)->update($request->all());

        session()->flash('status', 'Menu Item updated successfully');
        return redirect(route('admin.menu', ['parent_id' => $parent_id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $parent_id)
    {
        Menus::find($id)->destroy($id);
        session()->flash('status', 'Menu Item successfully removed');
        return redirect(route('admin.menu', ['parent_id' => $parent_id]));
    }
}
