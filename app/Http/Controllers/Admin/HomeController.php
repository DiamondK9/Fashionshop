<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Customers;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Producer;
use App\Models\Orders;

class HomeController extends Controller
{
    public function index() {
        $products = Product::query()->paginate(3);
        $customers = Customers::query()->paginate(3);
        $orders = Orders::query()->paginate(3);
        $product_type = ProductType::query()->paginate(3);
        return view('admin.home.index', [
            'products' => $products,
            'product_type' =>$product_type,
            'customers' => $customers,
            'orders' => $orders
        ]);
    }
}
