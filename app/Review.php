<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    /**
     * Creates relationship to sellers table
     * seller_id to sellers.id
     * @return relationship
     */
    public function sellers() {
        return $this->belongsTo('\App\Seller', 'seller_id', 'id');
    }

}
