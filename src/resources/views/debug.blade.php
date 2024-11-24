@extends('web::layouts.grids.12')

@section('title', "Planetary Industry | DEBUG")
@section('page_header', "Planetary Industry")

@push('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/planetaryIndustry.css') }}"/>
@endpush


@section('full')
    <div class="row">
        @dump($userPlanets)
        @dump($routes)
        @include('web::partials.type', ['type_id' => '2288', 'type_name' => 'Carbon Compounds'])
    </div>
@stop