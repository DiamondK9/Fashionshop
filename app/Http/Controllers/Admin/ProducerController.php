<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Producer;
use App\Models\ProductType;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers = Producer::query()->paginate(15);

        return view('admin.producer.index', ['producers' => $producers]);
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
        return view('admin.producer.create', [
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
            'producer_name' => 'required|max:191',
            // 'product_code' => 'required|max:255',
            'producer_number' => 'numeric',
            'producer_email' => 'email'
        ];
        $request->validate($rules);

        $producer_image = '';

        if ($request->hasFile('producer_image')) 
        {
            $file = $request->file('producer_image');
            $producer_image = time() . "-" . $file->getClientOriginalName();

            $file->storeAs("public/producer", $producer_image);
        }

        $producer = new Producer;
        $producer->fill($request->all());

        $producer->producer_image = $producer_image;

        $check = $producer->save();
        if ($check) {
            return redirect('admin/producer')->with('success', "Tạo mới thành công");
        }
        return redirect('admin/producer/create')->with('error', "Tạo mới thất bại");
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
    public function edit($producer_id)
    {
        // $id = $producer_id;
        $producer = Producer::findOrFail($producer_id);

        $producers = Producer::whereActive(1)->get();
        $product_types = ProductType::whereActive(1)->get();
        return view('admin.producer.edit', [
            'producer' => $producer, 
            // 'producers' => $producers,
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
    public function update(Request $request, $producer_id)
    {
        $producer = Producer::findOrFail($producer_id);

        $rules = [
            'producer_name' => 'required|max:191',
            'producer_phone' => 'numeric',
            'producer_email' => 'email'
        ];

        $request->validate($rules);

        $producer->fill($request->all());

        if ($request->hasFile('producer_image')) {
            $old_producer_image = $producer->producer_image; 

            $file = $request->file('producer_image');
            $producer_image = time() . "-" . $file->getClientOriginalName();
            $file->storeAs('public/producer', $producer_image);
            $producer->producer_image = $producer_image;

            @unlink(public_path('storage/producer/' . $old_producer_image));
        }

        

        $check = $producer->save();
        if ($check) {
            return redirect('admin/producer')->with('success', "Cập nhật điện thoại " . $producer->producer_name . " thành công");
        }
        return redirect('admin/producer/' . $producer->producer_id . "/edit")->with('error', "Cập nhật thất bại");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producer_id)
    {
        $producer = Producer::findOrFail($producer_id);

        if($producer->delete()) {
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'error'
        ]); 
    }
}
