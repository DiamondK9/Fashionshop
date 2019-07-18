<?php
namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Product;

class CartController extends Controller
{
	public function add_cart(Request $request) {
		$product_id = $request->post('product_id');
		$product = Product::findOrFail($product_id);
		if (isset($product)) {
			$item	= [
				'product_name' => $product->product_name,
				"product_id" => $product->product_id,
				"product_image" => $product->product_image,
				"product_price" => $product->product_price,
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
			return reponse()->json([
				'staus' => 1,
				'message' => "Xóa thành công",
			]);
		}
		return reponse()->json([
			'staus' => 0,
			'message' => "Xóa thất bại. Không có sản phẩm này tron giỏ hàng",
		]);
	}
	public function update_cart(Request $request) {
		$product_id = $request->post('product_id');

		$cart = Cart::getInstance()->getItemCart($product_id);

		if (!empty($cart)) {
			return reponse()->json([
				'staus' => 1,
				'message' => "Cập nhật thành công",
			]);
		}
		return reponse()->json([
			'staus' => 0,
			'message' => "Cập nhật thất bại. Không có sản phẩm này tron giỏ hàng",
		]);
	}
}
