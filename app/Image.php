<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    /**
     * Creates relationship to listings table linking
     * listing_id to listings.id
     * @return relationships
     */
    public function listings() {
        return $this->belongsTo('\App\Listing', 'listing_id', 'id');
    }

}
