<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model {

    /**
     * Creates relationship to vehicle_models table
     * vehicle_make_id to vehicle_models.id
     * @return relationship
     */
    public function vehicleModels() {
        return $this->hasMany('\App\VehicleModel', 'id', 'vehicle_make_id');
    }

}
