<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SellerProduct extends Model
{
    use HasFactory;
    protected $table = 'seller_products';
    protected $guarded = [];

    /**
     * calculate price
     */

     public function setPriceAttributes() {
         $price = DB::table('products')->where('id',$this->product_id)->first();
         return $price->price - $this->discount;
     }
    /**
     * relation between seller and SellerProduct
     * relation 1 to many
     */
    public function seller() {
        return $this->belongsTo(Seller::class,'seller_id');
    }

     /**
     * relation between Product and SellerProduct
     * relation 1 to many
     */
    public function product() {
        return $this->belongsTo(Product::class,'product_id');
    }

}
