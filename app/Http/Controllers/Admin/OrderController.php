<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Banner;
use App\Models\Customers;
use App\Models\Producer;
use App\Models\Orders;
use App\Helper\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::query()->paginate(8);
        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($order_id)
    {
        $orders = Orders::findOrFail($order_id);
        return view('admin.order.edit', ['orders' =>$orders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order_id)
    {
        $orders = Orders::findOrFail($order_id);
        $rule = ['active' => 'numeric'];
        $request->validate($rule);
        $orders ->fill($request->all());
        $check = $orders->save();
        if ($check) {
            return redirect('admin/order/')->with('success', "Cập nhật thành công");
        }
        return redirect('admin/order/')->with("error", "Cập nhật thất bại");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $orders = Orders::findOrFail($id);
        if($orders->delete()){
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'error'
        ]);
    }
}
