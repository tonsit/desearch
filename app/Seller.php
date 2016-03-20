<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model {

    /**
     * Creates relationship to listings table
     * listings.seller_id to id
     * @return relationship
     */
    public function listings() {
        return $this->hasMany('\App\Listing', 'id', 'seller_id');
    }

    /**
     * Creates relationship to reviews table
     * reviews.seller_id id
     * @return relationship
     */
    public function reviews() {
        return $this->hasMany('\App\Review', 'id', 'seller_id');
    }

}
