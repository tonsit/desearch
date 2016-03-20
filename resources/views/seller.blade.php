{{-- seller.blade.php
    This view displays full details about a particualr seller
    $seller object is passed to this view
    --}}
@extends('layouts.master')

@section('title', 'Seller Profile')

@section('content')
<h1> Seller Profile</h1>
<div class="row">
    <div class="seller-name">
    Name: {{$seller->name}}
    </div>
    <div class="seller-type">
    Role: {{$seller->type}}
    </div>
    <div class="seller-address">
        Address: {{$seller->address_street}}<br>
     {{$seller->address_city}}
    , {{$seller->address_state}}
    </div>
    <div class="seller-name">
    Phone number: {{$seller->phone}}
    </div>
    <div class="seller-name">
    Email: {{$seller->email}}
    </div>
    <div class="seller-name">
    Website: {{$seller->website}}
    </div>
    
</div>

@endsection