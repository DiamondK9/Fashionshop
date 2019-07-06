<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Producttype;
// use App\Models\ProductTypeSub;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = ProductType::query()->paginate(15);

        return view('admin.producttype.index', ['producttypes' => $producttypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttypes = ProductType::whereActive(1)->get();
        // $producttype_subs = ProductTypeSub::where("active", 1)->get();
        return view('admin.producttype.create', [
            'producttypes' => $producttypes,
            // 'producttypes' => $producttypes
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
            'producttype_name' => 'required|max:191',
            // 'product_code' => 'required|max:255',
            // 'producttype_number' => 'numeric',
            // 'producttype_email' => 'email'
        ];
        $request->validate($rules);

        $producttype_image = '';

        if ($request->hasFile('producttype_image')) 
        {
            $file = $request->file('producttype_image');
            $producttype_image = time() . "-" . $file->getClientOriginalName();

            $file->storeAs("public/producttype", $producttype_image);
        }

        $producttype = new Producttype;
        $producttype->fill($request->all());

        $producttype->producttype_image = $producttype_image;

        $check = $producttype->save();
        if ($check) {
            return redirect('admin/producttype')->with('success', "Tạo mới thành công");
        }
        return redirect('admin/producttype/create')->with('error', "Tạo mới thất bại");
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
    public function edit($producttype_id)
    {
        $producttype = ProductType::findOrFail($producttype_id);

        $producttypes = ProductType::whereActive(1)->get();
        // $product_types = ProductType::whereActive(1)->get();
        return view('admin.producttype.edit', [
            'producttype' => $producttype, 
            // 'producttypes' => $producttypes,
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
    public function update(Request $request, $producttype_id)
    {
        $producttype = ProductType::findOrFail($producttype_id);

        $rules = [
            'producttype_name' => 'required|max:191',
            'producttype_phone' => 'numeric',
            'producttype_email' => 'email'
        ];

        $request->validate($rules);

        $producttype->fill($request->all());

        if ($request->hasFile('producttype_image')) {
            $old_producttype_image = $producttype->producttype_image; 

            $file = $request->file('producttype_image');
            $producttype_image = time() . "-" . $file->getClientOriginalName();
            $file->storeAs('public/producttype', $producttype_image);
            $producttype->producttype_image = $producttype_image;

            @unlink(public_path('storage/producttype/' . $old_producttype_image));
        }

        

        $check = $producttype->save();
        if ($check) {
            return redirect('admin/producttype')->with('success', "Cập nhật điện thoại " . $producttype->producttype_name . " thành công");
        }
        return redirect('admin/producttype/' . $producttype->producttype_id . "/edit")->with('error', "Cập nhật thất bại");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producttype_id)
    {
        $producttype = ProductType::findOrFail($producttype_id);

        if($producttype->delete()) {
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'error'
        ]); 
    }
}
