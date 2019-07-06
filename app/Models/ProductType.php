<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $primaryKey = 'producttype_id'; /*Add 04/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' products'.'id'...*/
    
    protected $fillable = [/*'product_type_id',*/'producttype_name', ' producttype_image','producttype_sub_id'];/*Edit 04/07/2019*/

    public function product() {
		return $this->hasMany(\App\Models\Product::class);

	}
	public function product_type_sub(){
		return $this->hasMany(\App\Models\ProductType_sub::class);
	}

	public function producer(){
		return $this->hasMany(\App\Models\Producer::class);
	}
}
