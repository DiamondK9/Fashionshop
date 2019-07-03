<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', ' product_image', 'product_quantity','product_price','product_type_id', 'producer_id'];
    public function producer() {
		return $this->belongsTo(\App\Models\Producer::class);

	}
	public function type_product(){
		return $this->belongsTo(\App\Models\ProductType::class);
	}
}
