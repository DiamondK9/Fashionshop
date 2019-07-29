<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	protected $primaryKey = 'order_id'; 

	protected $foreignKey = ['producer_id', 'customer_id', 'product_id'];/*Add 06/07/2019 -> Edit table work from SQLSTATE(42S22) Column not found:1054, unknow collumn ' 
    producer'.'id'...*/

    protected $fillable = ['customer_id', 'product_id', 'product_quantity', 'unit_price', 'active', 'customer_name', 'customer_address', 'customer_phone'];
    public function product(){
        return $this->belongsTo(\App\Models\Product::class, 'product_id'); // linkage with Product table through foreignkey 'product_id' so we will able to be accessed Product values via 'product_id' as a link brigde. Example can be found in order/index.blade.php line 36.
    }

    public function customer(){
        return $this->belongsTo(\App\Models\Customers::class);
    }
}
