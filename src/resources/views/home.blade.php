@extends('web::layouts.grids.12')

@section('title', "Planetary Industry | $character_name")
@section('page_header', "Planetary Industry")

@push('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/planetaryIndustry.css') }}"/>
@endpush


@section('full')
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-yellow elevation-1"><i class="fa fa-warehouse"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Extracted Resources <small>(last 12 month's)</small></span>
                    <span class="info-box-number">
                        {{ number_format(0) }} <small>units</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-red elevation-1"><i class="fa fa-boxes"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Extracted Volume <small>(last 12 month's)</small></span>
                    <span class="info-box-number">
                        {{ number_format(0) }} <small>m³</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-green elevation-1"><i class="fa fa-coins"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Extracted ISK <small>(last 12 month's)</small></span>
                    <span class="info-box-number">
                        {{ number_format(0) }} <small>ISK</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-indigo elevation-1"><i class="fa fa-warehouse"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Extracted Resources <small>(this month)</small></span>
                    <span class="info-box-number">
                        {{ number_format(0) }} <small>units</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-blue elevation-1"><i class="fa fa-boxes"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Extracted Volume <small>(this month)</small></span>
                    <span class="info-box-number">
                        {{ number_format(0) }} <small>m³</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="info-box">
                <span class="info-box-icon bg-purple elevation-1"><i class="fa fa-coins"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Extracted ISK <small>(this month)</small></span>
                    <span class="info-box-number">
                        {{ number_format(0) }} <small>ISK</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
@stop