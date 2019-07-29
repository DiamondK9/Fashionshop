@extends("index")
@section('content')
	<section class="main-content-section">
			<div class="container" style="display: inline-block;">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{route('home')}}">Trang chủ</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Khu vực <strong>Giỏ hàng</strong> của bạn</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				@if (session('success'))
				<div class="alert alert-success">
					<p>{{ session('success') }}</p>
				</div>
				@endif
			<form action="{{route('add_order')}}" method="get" enctype="multipart/form-data" accept-charset="utf-8">
				@csrf
				

					{{-- BSTORE CART LIST-FORM MENU --}}
					<div class="col-md-9 row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: inline-block;">
							<div class="table-responsive">
								<h3><strong>Danh sách</strong> giỏ hàng của bạn</h3>
								<div class="form-group">
									<label for="">Quý khách vui lòng điền thông tin đặt hàng</label>
									<label for="">Họ Tên</label>
									<input type="text" class="form-control" name="customer_name" placeholder="Tên">
									<label for="Phone">Số điện thoại</label>
									<input type="number" class="form-control" name="customer_phone" placeholder="Số điện thoại">
									<label for="address">Địa chỉ</label>
									<input type="text" class="form-control" name="customer_address" placeholder="Địa chỉ">
									<label for="Email">Email</label>
									<input type="text" class="form-control" name="customer_email" placeholder="Email">
								</div>
							</div>
								<table class="table table-hover table-striped">
									<table class="table" id="cart-summary">
										<thead>
											<tr>
												<th class="cart-description text-center">Hình ảnh</th>
												<th class="cart-product text-center">Tên SP</th>
												<th class="cart-unit text-right text-center">Giá SP</th>
												<th class="cart_quantity text-center">Số Lượng</th>
												<th class="cart-total text-center">Thành tiền</th>
												<th class="cart-delete text-center">Cập nhật</th>
												<th class="cart-delete text-center">Xóa</th>
											</tr>
										</thead>
					{{--END OF BSTORE CART LIST-FORM MENU --}}
										<tbody>
					{{-- BSTORE CART LIST-INPUT DATA MENU --}}
										<?php $total = 0; ?>
										@forelse($carts as $cart )

											<?php $total += $cart['qty'] * $cart['price'] ; ?>

											<tr>
												<td class="cart-product"><img src="{{asset('../storage/app/public/product/' . $cart['image'])}}" alt="" style="width:100px"></td>

												<td class="cart-description text-center" style="color: black;">{{$cart['name']}}</td>

												<td class="cart-unit">{{number_format($cart['price'])}}</td>

												<td class="cart_quantity text-center">
													<input name="txtSoLuong" class="txtSoLuong" id="txtSoLuong" type="number" min="1" value="{{$cart['qty']}}" required pattern="[0-9]{1,3}" title="Số lượng phải là số và nhỏ hơn 4 kí tự"/>
												</td>

												<td class="cart-description text-center" style="color: black;">
													{{number_format($cart['qty'] * $cart['price'])}}
												</td>

												<input type="hidden" name="product_id" data-id="product_id" id="product_id" value="{{ $cart['id'] }}">

												<td class="cart-delete text-center">
													<span>
														<button type="button" class="btn btn-success btnUpdateCart" data-id= "{{$cart['id']}}"><i class="fa fa-refresh"></i></button>
													</span>
													
												</td>
												<td class="cart-delete text-center">
													<span>
														<button type="button" class="btn btn-danger btnDeleteCart" data-id= "{{$cart['id']}}"><i class="fa fa-remove"></i></button>
													</span>
												</td>
											</tr>
										@empty
											<tr>
												<td colspan="5">Không có sản phẩm</td>
											</tr>
											
										@endforelse
											<tr>
												<td class="total-price-container" style="text-align: center;" colspan="7"><span style="color: black; font-weight: bolder; font-size: 16px;">Tổng tiền: {{number_format($total)}} VND</span></td>
											</tr>
											<tr>
												<td colspan="7" style="text-align: center;">
													<a type="" href="{{ route('home')}}" class="btn btn-primary">Tiếp tục mua hàng</a>
													<a type="submit" class="btn btn-primary">Thanh Toán</a>
												</td>
												
											</tr>
					{{-- END OF BSTORE CART LIST-INPUT DATA MENU --}}	
										</tbody>
									</table>
								</table>
			</form>
			</div>
	</section>

<script type="text/javascript">

	// function deleteCart() {
	// 	alert(12);
	// }
	$(document).ready(function() {

		$(".btnUpdateCart").click(function(e) {
			let qty = $(this).parent().parent().find("#txtSoLuong").val();
			let id = $(this).data('id');
			$.ajax({
				url: '{{url("cart/update")}}',
				type: "POST",
				dataType: 'json',
				data: {id: id, qty: qty, _token: "{{csrf_token()}}"},
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

		$('.btnDeleteCart').click(function(e) {
			let id = $(this).data('id');
			if(confirm("Bạn chắc chắn xóa sản phẩm này?")) 
			{
				$.ajax({
					
						url: '{{url('cart/remove')}}',
						type: 'POST',
						data:{ id: id, _token: "{{csrf_token()}}"},
						success: function(result){
							if (result.status == 1){
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