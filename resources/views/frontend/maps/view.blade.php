@extends('frontend.layouts.app')

@section('title', app_name() . ' | Maps')

@section('after-scripts')

    {!! $map['js'] !!}
    <script src="../js/map.js"></script>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-map"></i> <strong>Maps</strong>

                    <a href="{{ route('frontend.maps.show', ['map' => 'kml_layer']) }}" class="btn btn-sm btn-primary pull-right">KML Layer</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'clustering']) }}" class="btn btn-sm btn-primary pull-right">Clustering</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'streetview']) }}" class="btn btn-sm btn-primary pull-right">Streetview</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'directions']) }}" class="btn btn-sm btn-primary pull-right">Directions</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'drawing']) }}" class="btn btn-sm btn-primary pull-right">Drawing</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'polygon']) }}" class="btn btn-sm btn-primary pull-right">Polygon</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'polyline']) }}" class="btn btn-sm btn-primary pull-right">Polyline</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'markers_multiple']) }}" class="btn btn-sm btn-primary pull-right">Multiple Markers</a>
                    <a href="{{ route('frontend.maps.show', ['map' => 'markers_single']) }}" class="btn btn-sm btn-primary pull-right">Single Markers</a>

                </div>
                <div class="card-body">
                    {!! $map['html'] !!}
                    <div id="directionsDiv"></div>
                </div>
            </div>
        </div>
    </div><!--row-->
@endsection
