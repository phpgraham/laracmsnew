@extends('backend.layouts.app')

@section('page-header')
    <h1>
        Pages Manager
        <a class="btn btn-primary btn-sm pull-right" href="{{ route('admin.pages.create') }}" aria-label="Click to add new page">Add New Page</a>
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
                                <!--
                                <th width="80">Sub Menu</th>
                                <th width="100">Order</th>
                                -->
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>

                                <!--
                                <td align="center">
                                    <a class="btn btn-primary btn-sm" title="View Submenu"
                                        href=" route('admin.pages', ['id' => $page->id]) }}">
                                        <span class="fa fa-bars" aria-label="Click to view submenu"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" title="Move up"
                                        href=" route('admin.pages.edit', ['id' => $page->id, 'position' => $pos, 'direction' => 'up']) }}">
                                        <span class="fa fa-arrow-up" aria-label="Click to move item up in menu"></span>
                                    </a>
                                    <a class="btn btn-primary btn-sm" title="Move down"
                                        href=" route('admin.pages.edit', ['id' => $page->id, 'position' => $pos, 'direction' => 'down']) }}">
                                        <span class="fa fa-arrow-down" aria-label="Click to move item down in menu"></span>
                                    </a>
                                </td>
                                -->
                                <td class="push-right">
                                    <a class="btn btn-primary btn-sm" title="Edit Page"
                                        href="{{ route('admin.pages.show', ['id' => $page->id]) }}">
                                        <span class="fa fa-pencil-square-o" aria-label="Click to edit page item"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm" title="Delete Page"
                                        href="{{ route('admin.pages.delete', ['id' => $page->id]) }}"
                                        onclick="return confirm('Are you sure?')">
                                        <span class="fa fa-times" aria-label="Click to delete page"></span>
                                    </a>
                                    @if( $page->active === 0 )
                                    <a class="btn btn-success btn-sm" title="Active"
                                        href="{{ route('admin.pages.status', ['id' => $page->id]) }}">
                                        <span class="fa fa-eye" aria-label="Click to make page not active"></span>
                                    </a>
                                    @else
                                    <a class="btn btn-warning btn-sm" title="Not Active"
                                        href="{{ route('admin.pages.status', ['id' => $page->id]) }}">
                                        <span class="fa fa-eye-slash" aria-label="Click to make page active"></span>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


</div>
@endsection
