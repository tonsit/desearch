{{-- listing.blade.php
    This view displays an individual listing with full details
    --}}
@extends('layouts.master')

@section('title', 'Listing')

@section('content')
<h1>Listing</h1>
<div class="listing">
    <div class="images row">
        @foreach($images as $image)
        <a href="{{$image->image_file}}" data-lightbox="lightbox">
        <img src="{{$image->image_file}}" class="img-thumbnail col-sm-2" width="150" height="120" />
        </a>
        @endforeach
    </div>
    <div class="listing-overview">
        <div class="row">
            <div class="listing-year col-sm-3">
                Year: {{ $listing->year }}<br>
            </div>
            <div class="listing-vehicleMake col-sm-3">
                Make: {{ $vehicleMake[0]->name }}<br>
            </div>
            <div class="listing-vehicleModel col-sm-3">
                Model: {{ $listing->vehicleModels->name }}<br>
            </div>
            <div class="listing-vehicleType col-sm-3">
                @if($listing->vehicle_type == '1')
                Type: Motorcycle<br>
                @elseif($listing->vehicle_type == '2')
                Type: Car<br>
                @elseif($listing->vehicle_type == '3')
                Type: Truck<br>
                @elseif($listing->vehicle_type == '4')
                Type: RV<br>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="listing-price col-sm-6">
                Price: ${{ $listing->price }}<br>
            </div>
            <div class="listing-sellersName col-sm-6">
                <a href='{{url("seller/$listing->seller_id")}}'>
                Seller: {{ $listing->sellers->name }}<br>
                </a>
            </div>
        </div>
        <div class="listing-description">
            <p>Description: {{ $listing->description }}</p>
        </div>
        <div class="listing-metaData">
            <p>Meta Data: {{ $listing->meta_data }}</p>
        </div>
    </div>
</div>
<hr>
{{-- Add email seller form --}}
@include('forms.emailSeller', [ 'id' => $listing->id, 'sellerEmail' => $listing->sellers->email])
<hr>
<div class="reviews">
    @foreach($reviews as $review)
<div class="review">
<a href="#review{{$review->id}}" data-toggle="collapse">
    <div class="row">
            <div class="col-sm-4">
                Reviewed by: {{$review->name}}<br>
            </div>
            <div class="col-sm-4">
                Rating: {{$review->rating}}/5<br>
            </div>
            <div class="col-sm-4">
                Date: {{$review->updated_at}}<br>
            </div>
        </div>
</a>
        <div id="review{{$review->id}}" class="row collapse">
            Comments: {{$review->description}}<br>
        </div>
    </div>
    <hr>
    @endforeach
</div>

@endsection
