<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Orders;
use App\Helper\Cart;

class CartController extends Controller
{
	// public function cart()
	// {
	// 	return view('cart');
	// }

	public function add_cart(Request $request) {
		$id = $request->post('product_id');
		$qty = $request->post("txtSoLuong");
		$product = Product::findOrFail($id);

		//if cart is empty then created the first product
		//isset kiểm tra xem biến $product đã được khởi tạo trên csdl chưa, nếu được khởi tạo vậy các giá trị mang tên $product sẽ được đưa vào biến $item. trong $cart có $item và giá trị của $item là các giá trị của $product.
		if (isset($product)) {
			$item	= [
				'name' => $product->product_name,
				"id" => $product->product_id,
				"image" => $product->product_image,
				"price" => $product->product_price,
				"qty" => $qty
    		
			];
			Cart::getInstance()->addCart($id, $item);
			//dd($item); die();
			return redirect(url("cart/list"))->with("success", "Thêm giỏ hàng thành công");
		}
		return redirect("/");
	}
	public function list_cart() {
		$carts = Cart::getInstance()->getAllCart();
		//dd($carts);
		return view('cart.list', compact('carts'));
	}

	public function remove_cart(Request $request) {
		$id = $request->post('id');
		$remove = Cart::getInstance()->removeCart($id);
		if ($remove) {
			return Response()->json([
				'status' => 1,
				'message' => "Xóa thành công",
			]);
		}
		return Response()->json([
			'status' => 0,
			'message' => "Xóa thất bại. Không có sản phẩm này trong giỏ hàng",
		]);
	}
	public function update_cart(Request $request) {

		$id = $request->post('product_id');
		$qty = $request->post('qty');

		$cart = Cart::getInstance()->getItemCart($id);

		if (!empty($cart)) {
			Cart::getInstance()->updateQty($id, $qty);
			return Response()->json([
				'status' => 1,
				'message' => "Cập nhật thành công",
			]);
		}

		// if ($request instanceof Jsonable) {
		// 	$request = Cart::getInstance()->updateproduct_quantity($product_id, $product_quantity);
  //           return $request->toJson([
  //           	'status' => 1,
		// 		'message' => "Cập nhật thành công",
  //           ]);

  //       } 
        /*if ($request instanceof Arrayable) {
        	$request = Cart::getInstance()->updateproduct_quantity($product_id, $product_quantity);
            return json_encode($request->toArray([
            	'status' => 1,
				'message' => "Cập nhật thành công",
            ]));
        }*/

		return Response()->json([
			'status' => 0,
			'message' => "Cập nhật thất bại. Không có sản phẩm này trong giỏ hàng",
		]);
	}
}
