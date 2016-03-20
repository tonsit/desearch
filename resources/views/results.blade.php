{{-- results.blade.php
    This view provides an overview of all search results
    --}}
@extends('forms.find')
@section('query')
<hr>
@if(count($listings) === 0)
<div class="alert alert-warning">
    No results found!
</div>
    @else
@foreach($listings as $listing)
<a href='{{url("listing/$listing->id")}}'>
    <div class="listing">
        <div class="listing-thumbnail pull-left">
            <?php $imageFile = ''; ?>
            @foreach($images as $image)
            @if($listing->id == $image->listing_id)
            @unless($imageFile)
             <?php $imageFile = $image->image_file; ?>
            @endunless
            @endif
            @endforeach
            <img src="{{$imageFile}}" class="img-thumbnail" width="100" height="80" />
        </div>
        <div class="listing-overview">
            <div class="row">
                <div class="listing-year col-sm-3">
                    Year: {!! $listing->year !!}
                </div>
                <div class="listing-vehicleMake col-sm-3">
                    @foreach($vehicleMakes as $vehicleMake)
                    @if($listing->vehicleModels->vehicle_make_id == $vehicleMake->id)
                    Make: {!! $vehicleMake->name !!}
                    @endif
                    @endforeach
                </div>
                <div class="listing-vehicleModel col-sm-3">
                    Model: {!! $listing->vehicleModels->name !!}            </div>
                <div class="listing-vehicleType col-sm-3">
                    @if($listing->vehicle_type == '1')
                    Type: Motorcycle
                    @elseif($listing->vehicle_type == '2')
                    Type: Car
                    @elseif($listing->vehicle_type == '3')
                    Type: Truck
                    @elseif($listing->vehicle_type == '4')
                    Type: RV
                    @endif
                </div>
                <div class="listing-price col-sm-3">
                    Price: ${!! $listing->price !!}
                </div>
                <div class="listing-sellersName col-sm-3">
                    Seller: {!! $listing->sellers->name !!}
                </div>
            </div>
        </div>
        <hr>
    </div>
</a>
@endforeach
@endif
@endsection
