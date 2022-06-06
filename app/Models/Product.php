<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    /**
     * relation many to many between products and sellers
     */

    public function sellers() {
        return $this->belongsToMany(Seller::class,'seller_products','product_id','seller_id');
    }
}
