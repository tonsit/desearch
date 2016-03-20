{{-- find.blade.php
    This view provides a form for searching among listings
    --}}
@extends('..layouts.master')

@section('title', 'Vehicle Search')

@section('content')
<h1>Search for a vehicle</h1>

{{-- Check for validation errors --}}
@unless(count($errors) === 0)
<div class="alert alert-warning">
    <ul>
        @if( $errors->has('motorcycleCheckbox') || $errors->has('carCheckbox') || $errors->has('truckCheckbox') || $errors->has('rvCheckbox') )
        <li>Please select at least one vehicle type to search!</li>
        @endif
        @foreach($errors->all() as $error)
        @unless($error == 'Please select at least one vehicle type to search!')
        <li>{{ $error }}</li>
        @endunless
        @endforeach
    </ul>
</div>
@endunless

{!! Form::open(array('route' => 'results', 'class' => 'form')) !!}


<div class="form-group">
    Vehicle Type:
    <div class="row">
        <div class="btn btn-info">
            <label>
                <div class="checkbox-inline">
                    {!! Form::checkbox('motorcycleCheckbox', 'Motorcycle', null) !!}
                    Motorcycle
                </div>
            </label>
        </div>
        <div class="btn btn-info">
            <label>
                <div class="checkbox-inline">
                    {!! Form::checkbox('carCheckbox', 'Car', null) !!}
                    Car
                </div>
            </label>
        </div>
        <div class="btn btn-info">
            <label>
                <div class="checkbox-inline">
                    {!! Form::checkbox('truckCheckbox', 'Truck', null) !!}
                    Truck
                </div>
            </label>
        </div>
        <div class="btn btn-info">
            <label>
                <div class="checkbox-inline">
                    {!! Form::checkbox('rvCheckbox', 'RV', null) !!}
                    RV
                </div>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('keywords','Keywords') !!}
        {!! Form::text('keywords', null, 
        array('class'=>'form-control', 
        'placeholder'=>'Keywords')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('minimum','Price') !!}
        {!! Form::text('minimum', null, 
        array('class'=>'form-control', 
        'placeholder'=>'Minimum')) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('maximum','To') !!}
        {!! Form::text('maximum', null, 
        array('class'=>'form-control', 
        'placeholder'=>'Maximum')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::submit('Search', 
    array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
@endsection
