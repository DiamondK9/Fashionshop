<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Producer;
use App\Models\ProductType;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->paginate(15);
        
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producers = Producer::whereActive(1)->get();
        $product_types = ProductType::where("active", 1)->get();
        return view('admin.product.create', [
            'producers' => $producers,
            'product_types' => $product_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());  -> su dung de kiem tra thong tin duoc gui len  
        $rules = [
            'product_name' => 'required|max:191',
            // 'producer_name' => 'option',
            'product_price' => 'numeric',
            'product_quantity' => 'numeric'
        ];
        $request->validate($rules);

        $product_image = '';

        if ($request->hasFile('product_image')) 
        {
            $file = $request->file('product_image');
            $product_image = time() . "-" . $file->getClientOriginalName();

            $file->storeAs("public/product", $product_image);
        }

        $product = new Product;
        $product->fill($request->all());
        
        $product->product_image = $product_image;

        $check = $product->save();
        if ($check) {
            return redirect('admin/product')->with('success', "Tạo mới thành công");
        }
        return redirect('admin/product/create')->with('error', "Tạo mới thất bại");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        // $id = $product_id;
        $product = Product::findOrFail($product_id);

        $producers = Producer::whereActive(1)->get();
        $product_types = ProductType::whereActive(1)->get();
        return view('admin.product.edit', [
            'product' => $product, 
            'producers' => $producers,
            'product_types' => $product_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        $rules = [
            'product_name' => 'required|max:191',
            'product_price' => 'numeric',
            'product_quantity' => 'numeric'
        ];

        $request->validate($rules);

        $product->fill($request->all());

        if ($request->hasFile('product_image')) {
            $old_product_image = $product->product_image; 

            $file = $request->file('product_image');
            $product_image = time() . "-" . $file->getClientOriginalName();
            $file->storeAs('public/product', $product_image);
            $product->product_image = $product_image;

            @unlink(public_path('storage/product/' . $old_product_image));
        }

        

        $check = $product->save();
        if ($check) {
            return redirect('admin/product')->with('success', "Cập nhật điện thoại " . $product->product_name . " thành công");
        }
        return redirect('admin/product/' . $product->product_id . "/edit")->with('error', "Cập nhật thất bại");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);

        if($product->delete()) {
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'error'
        ]); 
    }
}
