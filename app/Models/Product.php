<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id'; /*Add 04/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' 
    products'.'id'...*/
    protected $foreignKey = ['producer_id', 'product_type_id'];/*Add 06/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' 
    producer'.'id'...*/


    protected $fillable = [/*'product_id',*/'product_type_id','producer_id','product_code','product_name', ' product_image', 'product_quantity','product_price'];/*Edit 04/07/2019*/

    public function producer() {
		return $this->belongsTo(\App\Models\Producer::class,'producer_id');/*Add 06/07/2019 -> add 'producer_id' vào để khai báo producer_id là foreign_key trong bảng product, khi trả về $this = product , 1 product sẽ thuộc về 1 nhà producer duy nhất với 1 producer_id duy nhất. "Eloquent Relationship Inverse" */

	}
	public function product_type(){
		return $this->belongsTo(\App\Models\ProductType::class,'product_type_id');
	}

    public function admin(){
        return $this->belongsTo(\App\Models\Admin::class);
    }

    public function order(){
        return $this->belongsTo(\App\Models\Orders::class);
    }
}
