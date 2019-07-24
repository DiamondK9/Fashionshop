<?php
namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Helper\Cart;

class CartController extends Controller
{
	public function cart()
	{
		return view('cart');
	}

	public function add_cart(Request $request) {
		$product_id = $request->post('product_id');
		$product_quantity = $request->post('txtSoLuong');
		$product = Product::findOrFail($product_id);

		//if cart is empty then created the first product
		//isset kiểm tra xem biến $product đã được khởi tạo trên csdl chưa, nếu được khởi tạo vậy các giá trị mang tên $product sẽ được đưa vào biến $item. trong $cart có $item và giá trị của $item là các giá trị của $product.
		if (isset($product)) {
			$item	= [
				'product_name' => $product->product_name,
				"product_id" => $product->product_id,
				"product_image" => $product->product_image,
				"product_price" => $product->product_price,
				"product_quantity" => $product_quantity
    		
			];
			Cart::getInstance()->addCart($product_id, $item);
			return redirect(url("cart/list"))->with("success", "Thêm giỏ hàng thành công");
		}
		return redirect("/");
	}
	public function list_cart() {
		$carts = Cart::getInstance()->getAllCart();

		return view('cart.list', compact('carts'));
	}

	public function remove_cart(Request $request) {
		$product_id = $request->post('product_id');
		$remove = Cart::getInstance()->removeCart($product_id);
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

		$product_id = $request->post('product_id');
		$product_quantity = $request->post('product_quantity');

		$cart = Cart::getInstance()->getItemCart($product_id);

		if (!empty($cart)) {
			Cart::getInstance()->updateproduct_quantity($product_id, $product_quantity);
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
