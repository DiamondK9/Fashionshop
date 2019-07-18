<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //gọi đến Models/Product
        $products = Product::query()->paginate(9);
        //trả về kết quả là page views\home\home.blade.php
        //truyền biến 'products' ra ngoài giao diện với key là products
        return view('home.home', ['products' => $products]);
    }

    public function detail($slug)
    {
        //hàm explode chuyển chuỗi slug vừa nhận được về mảng, theo sau dấu "-" được định nghĩa.
        $slug_arr = explode("-", $slug);
        $product_id = end($slug_arr);
        $related = Product::query()->limit(8)->get();
        $product = Product::findOrFail($product_id);
        return view('home.detail', ['product' => $product, "related" => $related]);
    }

}
