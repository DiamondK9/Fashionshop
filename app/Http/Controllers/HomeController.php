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
        $products = Product::query()->paginate(5);
        return view('home.home', ['products' => $products]);
    }

    public function detail($slug)
    {
        $slug_arr = explode("-", $slug);
        $id = end($slug_arr);
        $related = Product::query()->limit(8)->get();
        $product = Product::findOrFail($id);
        return view('home.detail', ['product' => $product, "related" => $related]);
    }

}
