<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id'; /*Add 04/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' 
    products'.'id'...*/

    protected $fillable = [/*'product_id',*/'product_type_id','producer_id','product_code','product_name', ' product_image', 'product_quantity','product_price'];/*Edit 04/07/2019*/

    public function producer() {
		return $this->belongsTo(\App\Models\Producer::class);

	}
	public function product_type(){
		return $this->belongsTo(\App\Models\ProductType::class);
	}
}
