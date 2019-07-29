<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Product;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::query()->paginate(8);
        return view('admin.customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customers::query()->paginate();
        return view('admin.customer.create', [
            'customers' => $customers
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
        $rule = [
            'customer_name' => 'required|max:191',
            'customer_password' =>'numeric',
            'customer_phone' =>'numeric',
            'customer_email' =>'required',
            'customer_address' => 'required',
            'active' => 'numeric',
        ];
        $request->validate($rule);
        $customers = new Customers;
        $customers->fill($request->all());
        $check = $customers->save();
        if ($check){
            return redirect('admin/customer')->with('success', "Thêm mới thành công");
        }
        return redirect('admin/customer')->with('error', "Thêm chưa thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $customer_id
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $customer_id
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {
        $customers = Customers::findOrfail($customer_id);
        return view('admin.customer.edit', ['customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $customer_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer_id)
    {
        $customers = Customers::findOrFail($customer_id);
        $rule = [
            'customer_name' => 'required|max:191',
            'customer_password' =>'numeric',
            'customer_phone' =>'numeric',
            'customer_email' =>'required',
            'customer_address' => 'required',

        ];

        $request -> validate($rule);
        $customers ->fill($request->all());
        // if ($request->hasFile('image')){
        //     $old_image = $customers->image;
        //     $file = $request->file('image');
        //     $image = time() . "-" . $file->getClientOriginalName();
        //     $file->storeAs('public/customer', $image);
        //     $customers->image = $image;
        //     @unlink(public_path('storage/customer' . $old_image));

           
        // }
        $check = $customers->save();
        if ($check) {
            return redirect('admin/customer/')->with('success', "Cập nhật thành công");
        }
        return redirect('admin/customer/')->with("error", "Cập nhật thất bại");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $customer_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id)
    {  
        $customers = Customers::findOrFail($customer_id);
        if($customers->delete()){
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'error'
        ]);
    }
}
