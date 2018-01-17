@extends('backend.layouts.app')

@section('page-header')
    <h1>
        Page Manager
        <small>Create New Page</small>
        <a class="btn btn-primary btn-sm pull-right" href="{{ url()->previous() }}">Back</a>
    </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        @if (session('status'))
            <div class="panel-body">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <div class="row mt-4 mb-4">
            <div class="col">

                <form class="form-horizontal" method="POST" action="{{ route('admin.pages.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ html()->label('Page Content')->for('content') }}

                        {{ html()->textarea('content')
                            ->class('form-control')
                            ->id('editor')
                            ->placeholder('Page Content')
                            ->attribute('rows', 8) }}
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
