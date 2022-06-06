<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';
    protected $fillable = ['name'];

    /**
     * relation many to many between sellers and products
     */

     public function products() {
         return $this->belongsToMany(Product::class,'seller_products','seller_id','product_id');
     }
}
