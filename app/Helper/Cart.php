<?php 
namespace App\Helper;

class Cart
{
	public static function getInstance() {
		return new static();
	}
	public function addCart($product_id, $item) {
		$cart = $this->getCart($product_id);

		if (empty($cart)) {
			$cart = [
				"product_name" => $item['product_name'],
				"product_id" => $item['product_id'],
				"product_price" => $item['product_price'],
				"product_image" => $item['product_image']
			];
		}
		else {
		}

		$this->setItemCart($product_id, $cart);
	}

	public function setItemCart($product_id, $cart) {
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = [];
		}

	$_SESSION['cart']['$product_id'] = $cart;
	}

	public function getItemCart($product_id) {
		if (isset($_SESSION['cart'][$product_id])) {
			return $_SESSION['cart'][$product_id];
		}
		return [];
	}

	public function getAllCart() {
		if (isset($_SESSION['cart'])) {
			return $_SESSION['cart'];
		}
		return [];
	}
	public function getCart($product_id) {
		if (isset($_SESSION['cart'][$product_id])) {
			return $_SESSION['cart'][$product_id];
		}
		return[];
	}

	public function countAllCart() {
		return count($this->getAllCart());
	} 

	public function removeCart($product_id) {
		$cart = $this->getItemCart($product_id);
		if (!empty($cart)) {
			unset($_SESSION['cart']['$product_id']);
			return true; 
		}
		return false;
	}
	}
}


?>