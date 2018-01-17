@extends('frontend.layouts.app')

@section('title', app_name() . ' | Pages')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file-text"></i> <strong>Pages</strong>
                </div>
                <div class="card-body">
                    @foreach ($pages as $page)

                        <a href="{{ route('frontend.pages.show', ['page' => $page->id]) }}"><h3>{{ $page->title }}</h3></a>

                    @endforeach
                </div>
            </div>
        </div>
    </div><!--row-->
@endsection
