@extends('backend.layouts.app')

@section('page-header')
    <h1>
        Menu Manager
        @if($menus[0]->parent_id>0)
            <small>{{ $parent_title['title'][0] }}</small>
        @endif
        <a class="btn btn-primary btn-sm pull-right" href="{{ route('admin.menu.create', ['parent_id' => $menus[0]->parent_id]) }}" aria-label="Click to add item to menu">Add New Menu Item</a>
        @if($menus[0]->parent_id>0)
        <a class="btn btn-primary btn-sm pull-right" href="{{ url()->previous() }}" aria-label="Click to add item to menu">Back</a>
        @endif
    </h1>
@endsection

@section('content')
<div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th width="100">Sub Menu</th>
                                <th width="100">Order</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $pos=0 ?>
                          @foreach($menus as $menu)
                              <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->title }}</td>
                                <td align="center">
                                    <a class="btn btn-primary btn-sm" title="View Submenu"
                                        href="{{ route('admin.menu', ['parent_id' => $menu->id]) }}">
                                        <span class="fa fa-bars" aria-label="Click to view submenu"></span>
                                    </a>
                                    {{ count($menu->children) }}
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" title="Move up"
                                        href="{{ route('admin.menu.edit', ['parent_id' => $menu->parent_id, 'position' => $pos, 'direction' => 'up']) }}">
                                        <span class="fa fa-arrow-up" aria-label="Click to move item up in menu"></span>
                                    </a>
                                    <a class="btn btn-primary btn-sm" title="Move down"
                                        href="{{ route('admin.menu.edit', ['parent_id' => $menu->parent_id, 'position' => $pos, 'direction' => 'down']) }}">
                                        <span class="fa fa-arrow-down" aria-label="Click to move item down in menu"></span>
                                    </a>
                                </td>
                                <td class="push-right">
                                    <a class="btn btn-primary btn-sm" title="Edit menu item"
                                        href="{{ route('admin.menu.show', ['id' => $menu->id]) }}">
                                        <span class="fa fa-pencil-square-o" aria-label="Click to edit menu item"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="Delete item"
                                        href="{{ route('admin.menu.delete', ['id' => $menu->id, 'parent_id' => $menu->parent_id]) }}"
                                        onclick="return confirm('Are you sure?')">
                                        <span class="fa fa-times" aria-label="Click to delete item from menu"></span>
                                    </a>
                                    @if( $menu->active === 0 )
                                    <a class="btn btn-success btn-sm" title="Active"
                                        href="{{ route('admin.menu.status', ['id' => $menu->id]) }}">
                                        <span class="fa fa-eye" aria-label="Click to make menu item not active"></span>
                                    </a>
                                    @else
                                    <a class="btn btn-warning btn-sm" title="Not Active"
                                        href="{{ route('admin.menu.status', ['id' => $menu->id]) }}">
                                        <span class="fa fa-eye-slash" aria-label="Click to make menu item active"></span>
                                    </a>
                                    @endif
                                </td>
                              </tr>
                              <?php $pos=$pos+1 ?>
                              <!--@ foreach($menu->children as $child)-->
                              <!--@ include('Backend.menus.partials.submenu', [$child, $x=100])-->
                              <!--@ endforeach-->
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
@endsection
