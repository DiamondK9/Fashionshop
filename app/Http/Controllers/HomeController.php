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

    //Searching Function
    // public function getSearch(Request $request){
    //     $product = Product::where('product_name', 'like', '%' . $request->key . '%')
    //                             -> orwhere('product_price', $request->key)
    //                             ->orwhere('product_type_id', $request->key)
    //                             -> paginate(12);
    //     //dd($product);die();
    //     return view('home.search', compact('product'));

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

     public function add_order(Request $request){
        $carts = Cart::getInstance()->getAllCart();
        //dd($carts);die();
        $customer = new Customers;
        $customer ->name = $request->name;
        $customer ->phone = $request->phone;
        $customer ->address = $request->address;
        $customer ->email = $request->email;
        $customer->save();
        foreach ($carts as $key => $value) {
            $order = new Orders;
            $order ->customer_id = $customer->id;
            $order->trees_id = $value['id'];
            $order->quantity = $value['quantity'];
            $order->unit_price = $value['price'];
            $order->save();
        }
        return redirect()->back()->with('success', "Đặt hàng thành công");

    }

}
