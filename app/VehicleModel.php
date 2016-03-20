<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model {

    /**
     * Creates relationship to listings table
     * vehicle_model_id to listings.id
     * @return relationship
     */
    public function listings() {
        return $this->hasMany('\App\Listing', 'id', 'vehicle_model_id');
    }

    /**
     * Creates relationship to vehicle_makes table
     * vehicle_make_id to vehicle_models.id
     * @return relationship
     */
    public function vehicleMakes() {
        return $this->belongsTo('\App\VehicleMake', 'vehicle_make_id', 'id');
    }

}
