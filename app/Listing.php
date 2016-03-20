<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model {

    /**
     * Creates relationship to sellers table
     * seller_id to sellers.id
     * @return relationship
     */
    public function sellers() {
        return $this->belongsTo('\App\Seller', 'seller_id', 'id');
    }

    /**
     * Creates relationship to vehicle_models table
     * vehicle_model_id to vehicle_models.id
     * @return relationship
     */
    public function vehicleModels() {
        return $this->belongsTo('\App\VehicleModel', 'vehicle_model_id', 'id');
    }

    /**
     * Creates relationship to images table
     * images.listing_id to id
     * @return relationship
     */
    public function images() {
        return $this->hasMany('\App\Image', 'id', 'listing_id');
    }

}
