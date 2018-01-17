@extends('backend.layouts.app')

@section('title', app_name() . ' | Pages')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file-text"></i> <strong>{{ $page->title }}</strong>
                </div>
                <div class="card-body">

                    <p>{{ $page->content }}</p>

                </div>
            </div>
        </div>
    </div><!--row-->
@endsection
