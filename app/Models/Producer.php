<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $primaryKey = 'producer_id'; /*Add 04/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' products'.'id'...*/
    protected $foreignKey = 'product_id';
    
    protected $fillable = ['producer_id','producer_name', ' producer_image', 'producer_phone','producer_email','product_id'];/*Edit 04/07/2019*/

    public function product() {
		return $this->hasMany(\App\Models\Product::class,'product_id');

	}
	public function product_type(){
		return $this->hasMany(\App\Models\ProductType::class);
	}
}
