<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $primaryKey = 'producer_id'; /*Add 04/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' products'.'id'...*/
    protected $fillable = ['producer_id','producer_name', ' producer_image', 'producer_phone','producer_email'];/*Edit 04/07/2019*/
    public function product() {
		return $this->belongsTo(\App\Models\Product::class);

	}
	public function product_type(){
		return $this->belongsTo(\App\Models\ProductType::class);
	}
}
