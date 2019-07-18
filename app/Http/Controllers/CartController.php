<?php
namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Phone;

class CartController extends Controller
{
	public function add_cart(Request $request) {
		$id = $request->post('id');
		$qty = $request->post("txtSoLuong");
		$phone = Phone::findOrFail($id);
		if (isset($phone)) {
			$item	= [
				'name' => $phone->name,
				"id" => $phone->id,
				"image" => $phone->image,
			];
			Cart::getInstance()->addCart($id, $item);
			return redirect(url("cart/list"))->with("success", "Thêm giỏ hàng thành công");
		}
		return redirect("/");
	}
	public function list_cart() {
		$carts = Cart::getInstance()->getAllCart();

		return view('cart.list', compact('carts'));
	}

	public function remove_cart(Request $request) {
		$id = $request->post('id');
		$remove = Cart::getInstance()->removeCart($id);
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
		$id = $request->post('id');
		$qty = $request->post('qty');

		$cart = Cart::getInstance()->getItemCart($id);

		if (!empty($cart)) {
			Cart::getInstance()->updateQty($id, $qty);
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
