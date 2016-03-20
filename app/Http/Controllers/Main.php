<?php

/* This is the main controller
 * It provides all controls for views
 * 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FindRequest;
use App\Http\Requests\EmailSellerRequest;
use App\Listing;
use App\Seller;
use App\Review;
use App\Image;
use App\VehicleModel;
use App\VehicleMake;
use DB;

class Main extends Controller {

    /**
     * Displays find form for searches
     * @return view
     */
    public function create() {
        return view('forms.find', array('page' => 'find'));
    }
    /**
     * Sends email to seller from emailSeller form
     * @param EmailSellerRequest $request
     * @return array $message
     */
    public function emailSeller(EmailSellerRequest $request) {
        \Mail::send('emails.seller', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'url' => \Request::url(),
            'body' => $request->get('message')
                ), function($message) use ($request) {
            $message->from($request->get('email'));
            $message->to($request->get('sellerEmail'))->subject('Vehicle Listing');
        });
        return \Redirect::back()
                        ->with('message', ['Email successfully sent to Seller: ' . $request->sellerEmail]);
    }

    /**
     * Display seller info
     * @param int $id
     * @return view, obj $seller
     */
    public function seller($id) {
        $seller = Seller::find($id);
        return view('seller', compact('seller'));
    }

    /**
     * Displays individual listing
     * @param int $id
     * @return view, obj $listing, $reviews, $vehicleMake, $images
     */
    public function listing($id) {
        $listing = Listing::with('sellers', 'vehicleModels')->find($id);
        $reviews = Review::where('seller_id', '=', $listing->seller_id)->get();
        $images = Image::where('listing_id', '=', $listing->id)->get();
        $vehicleMake = VehicleMake::where('id', '=', $listing->vehicleModels->vehicle_make_id)->get();
        return view('listing', compact('listing', 'reviews', 'vehicleMake', 'images'));
    }

    /**
     * Displays search results from form submission
     * @param FindRequest $request
     * @return view, obj $listing, $vehicleMakes, $images
     */
    public function results(FindRequest $request) {
        \Request::flash();
        $maximum = \Input::get('maximum');
        $minimum = \Input::get('minimum');
        $keyword = \Input::get('keywords');
        $listings = Listing::with('sellers', 'vehicleModels')
                ->where(function ($query) {
                    if (\Input::has('motorcycleCheckbox')) {
                        $query->orWhere('vehicle_type', '=', '1');
                    }
                    if (\Input::has('carCheckbox')) {
                        $query->orWhere('vehicle_type', '=', '2');
                    }
                    if (\Input::has('truckCheckbox')) {
                        $query->orWhere('vehicle_type', '=', '3');
                    }
                    if (\Input::has('rvCheckbox')) {
                        $query->orWhere('vehicle_type', '=', '4');
                    }
                })
                ->where(function ($query) use ($maximum, $minimum) {
                    if ($maximum) {
                        $query->where('price', '<', $maximum + 1);
                    }
                    if ($minimum) {
                        $query->where('price', '>', $minimum - 1);
                    }
                })
                ->where(function ($query) use ($keyword) {
                    if ($keyword) {
                        $keywords = \explode(" ", $keyword);
                        foreach ($keywords as $word) {
                            $query->orWhere('description', 'LIKE', '%' . $word . '%');
                            $query->orWhere('meta_data', 'LIKE', '%' . $word . '%');
                        }
                    }
                })
                ->get();
        $vehicleMakes = VehicleMake::all();
        $images = Image::all();
        return \View::make('results', compact('listings', 'vehicleMakes', 'images'));
    }

}
