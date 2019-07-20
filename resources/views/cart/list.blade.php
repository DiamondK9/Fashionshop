@extends("index")
@section('content')
<div class="table-responsive">
	<h3>Danh sách giỏ hàng</h3>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Hình ảnh</th>
				<th>Tên</th>
				<th>Gía</th>
				<th>SỐ Lượng</th>
				<th>Thành tiền</th>
				<th>Cập nhật</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>

			<?php $total = 0; ?>
			@forelse($carts as $cart )
			<?php $total += $cart['product_quantity'] * $cart['product_price'] ; ?>

			<tr>
				<td><img src="{{asset('../storage/app/public/product/' . $cart['product_image'])}}" alt="" style="width:100px"></td>

				<td>{{$cart['product_name']}}</td>

				<td>{{number_format($cart['product_price'])}}</td>

				<td><input product_name="txtSoLuong" class="txtSoLuong" id="txtSoLuong" type="number" min="1" value="{{$cart['product_quantity']}}" required pattern="[0-9]{1,3}" title="Số lượng phải là số và nhỏ hơn 4 kí tự"/></td>

				<td>{{number_format($cart['product_quantity'] * $cart['product_price'])}}</td>

				<td>
					<button type="button" class="btn btn-success btnUpdateCart" data-id= "{{$cart['product_id']}}"><i class="fa fa-refresh"></i></button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btnDeleteCart" data-id= "{{$cart['product_id']}}"><i class="fa fa-remove"></i></button>
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="5">Không có sản phẩm</td>
			</tr>
			@endforelse
			<tr>
				<td>Tổng tiền: {{number_format($total)}}</td>
				<td><a type="" href="{{ route('home')}}" class="btn btn-primary">Tiếp tục mua hàng</a></td>
				<td><a type="" class="btn btn-primary">Thanh Toán</a></td>
			</tr>
			
		</tbody>
	</table>
</div>
<script type="text/javascript">

	function deleteCart() {
		alert(12);
	}
	$(document).ready(function() {

		$(".btnUpdateCart").click(function(e) {
			let product_quantity = $(this).parent().parent().find("#txtSoLuong").val();
			let product_id = $(this).data('product_id');
			$.ajax({
				url: '{{url("cart/update")}}',
				type: "post",
				dataType: 'json',
				data: {product_id: product_id, product_quantity: product_quantity, _token: "{{csrf_token()}}"},

				success: function(result) {
					if (result.status == 1) {
						alert(result.message);

					}
					else {
						alert(result.message);

					}
				},


				error: function(error) {
					alert("Không cập nhật được");
				}
			});
		});
		$(".btnDeleteCart").click(function(e) {
			let product_id = $(this).data('product_id');
			if(confirm("Bạn chắc chắn xóa sản phẩm này?")) {
				$.ajax({
					url: '{{url("cart/remove")}}',
					type: "post",
					data: {product_id: product_id, _token: "{{csrf_token()}}"},
					success: function(result) {
						if (result,status == 1) {
							alert(result.message);
							window.location.reload(true);
						}
						else {
							alert(result.message);
						}
					},
					error: function(error) {
						alert("Không xóa được");
					}
				});
			}
		});
	});
		
</script>
@endsection