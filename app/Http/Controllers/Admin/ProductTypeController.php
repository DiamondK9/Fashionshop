<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
// use App\Models\Product_TypeSub;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = ProductType::query()->paginate(6);

        return view('admin.product_type.index', ['product_types' => $product_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = ProductType::whereActive(1)->get();
        // $product_type_subs = ProductTypeSub::where("active", 1)->get();
        return view('admin.product_type.create', [
            'product_types' => $product_types,
            // 'product_types' => $product_types
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
            'product_type_name' => 'required|max:191',
            // 'product_code' => 'required|max:255',
            // 'product_type_number' => 'numeric',
            // 'product_type_email' => 'email'
        ];
        $request->validate($rules);

        $product_type_image = '';

        if ($request->hasFile('product_type_image')) 
        {
            $file = $request->file('product_type_image');
            $product_type_image = time() . "-" . $file->getClientOriginalName();

            $file->storeAs("public/product_type", $product_type_image);
        }

        $product_type = new ProductType;
        $product_type->fill($request->all());

        $product_type->product_type_image = $product_type_image;

        $check = $product_type->save();
        if ($check) {
            return redirect('admin/product_type')->with('success', "Tạo mới thành công");
        }
        return redirect('admin/product_type/create')->with('error', "Tạo mới thất bại");
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
    public function edit($product_type_id)
    {
        $product_type = ProductType::findOrFail($product_type_id);

        $product_types = ProductType::whereActive(1)->get();
        // $product_types = Product_Type::whereActive(1)->get();
        return view('admin.product_type.edit', [
            'product_type' => $product_type, 
            // 'product_types' => $product_types,
            // 'product_types' => $product_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_type_id)
    {
        $product_type = ProductType::findOrFail($product_type_id);

        $rules = [
            'product_type_name' => 'required|max:191',
            'product_type_phone' => 'numeric',
            'product_type_email' => 'email'
        ];

        $request->validate($rules);

        $product_type->fill($request->all());

        if ($request->hasFile('product_type_image')) {
            $old_product_type_image = $product_type->product_type_image; 

            $file = $request->file('product_type_image');
            $product_type_image = time() . "-" . $file->getClientOriginalName();
            $file->storeAs('public/product_type', $product_type_image);
            $product_type->product_type_image = $product_type_image;

            @unlink(public_path('storage/product_type/' . $old_product_type_image));
        }

        

        $check = $product_type->save();
        if ($check) {
            return redirect('admin/product_type')->with('success', "Cập nhật điện thoại " . $product_type->product_type_name . " thành công");
        }
        return redirect('admin/product_type/' . $product_type->product_type_id . "/edit")->with('error', "Cập nhật thất bại");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_type_id)
    {
        $product_type = ProductType::findOrFail($product_type_id);

        if($product_type->delete()) {
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'error'
        ]); 
    }
}
