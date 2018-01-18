@extends('frontend.layouts.app')

@section('title', app_name() . ' | Maps')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-map"></i> <strong>Maps</strong>
                </div>
                <div class="card-body">
                    <div class="list-group">
                      <a href="{{ route('frontend.maps.show', ['map' => 'markers_single']) }}" class="list-group-item list-group-item-action">Single Marker</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'markers_multiple']) }}" class="list-group-item list-group-item-action">Multiple Markers</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'polyline']) }}" class="list-group-item list-group-item-action">Polyline</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'polygon']) }}" class="list-group-item list-group-item-action">Polygon</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'kml_layer']) }}" class="list-group-item list-group-item-action">KML Layer</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'clustering']) }}" class="list-group-item list-group-item-action">Clustering</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'streetview']) }}" class="list-group-item list-group-item-action">Streetview</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'directions']) }}" class="list-group-item list-group-item-action">Directions</a>
                      <a href="{{ route('frontend.maps.show', ['map' => 'drawing']) }}" class="list-group-item list-group-item-action">Drawing</a>

                    </div>
                </div>
            </div>
        </div>
    </div><!--row-->
@endsection
