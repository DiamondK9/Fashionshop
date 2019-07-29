@extends('index')
@section('content')
	<section class="main-content-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- BSTORE-BREADCRUMB START -->
					<div class="bstore-breadcrumb">
						<a href="index.html">Trang chủ</a>
						<span><i class="fa fa-caret-right	"></i></span>
						<span>Giỏ hàng của bạn</span>
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
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Quý khách vui lòng điền thông tin đặt hàng</label>
						<label for="">Họ Tên</label>
						<input type="text" class="form-control" name="name" placeholder="Tên">
						<label for="Phone">Số điện thoại</label>
						<input type="number" class="form-control" name="phone" placeholder="Số điện thoại">
						<label for="address">Địa chỉ</label>
						<input type="text" class="form-control" name="address" placeholder="Địa chỉ">
						<label for="Email">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
				</div>
				<div class="col-md-9">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="table-responsive">
									<table class="table table-bordered" id="cart-summary">
										<thead>
											<tr>
												<th class="cart-product text-center">Tên Sản phẩm</th>
												<th class="cart-description text-center">Ảnh</th>
												<th class="cart-unit text-right text-center">Đơn giá</th>
												<th class="cart_quantity text-center">Số lượng</th>
												<th class="cart-delete text-center" colspan="2">Active</th>
												<th class="cart-total text-center">Thành Tiền</th>
											</tr>
										</thead>
										<tbody>	
											@forelse ($carts as $cart)
											<tr>
												<td class="cart-description text-center" style="color: black;">
													{{$cart['name']}}
												</td>
												<td class="cart-product">
													<img src="{{asset('storage/tree/' . $cart['image'])}}" style="width: 100px;"/>	
												</td>
												<td class="cart-unit">
													<ul class="price text-right">
														<li class="price">{{number_format($cart['price'])}} VND</li>
													</ul>
												</td>
												<td class="cart_quantity text-center">
													<input name="txtSoLuong" class="txtSoLuong" id="txtSoLuong" type="number" min="1" value="{{$cart['quantity']}}" required pattern="[0-9]{1,3}" title="Số lượng phải là số và nhỏ hơn 4 kí tự"/>	
												</td>
												<td class="cart-delete text-center">
													<span>
														<button type="button" class="btn btn-success btnUpdateCart" data-id= "{{$cart['id']}}"><i class="fa fa-refresh"></i></button>
														{{-- <a href="#" class="cart_quantity_delete" title="Cập nhật"><i class="fa fa-refresh"></i></a> --}}
													</span>
												</td>
												<td class="cart-delete text-center">
													<span>
														<button type="button" class="btn btn-danger btnDeleteCart" data-id= "{{$cart['id']}}"><i class="fa fa-remove"></i></button>
														{{-- <a href="#" class="cart_quantity_delete" title="Xóa"><i class="fa fa-trash-o"></i></a> --}}
													</span>
												</td>
												<td class="cart-description text-center" style="color: black;">
														{{number_format($cart['quantity'] * $cart['price'])}}	
												</td>
											</tr>
											@empty
												<tr>
													<td colspan="7">Khong co san pham</td>
												</tr>
											@endforelse
											<tr>
												<td class="total-price-container text-right" colspan="3">
													<span style="color: black; font-weight: bolder; font-size: 16px;">Tổng tiền:</span>
												</td>
												<td id="total-price-container" class="price" colspan="4">
													<span id="total-price"><p style="float: right">VNĐ</p></span>
												</td>
											</tr>
										</tbody>					
									</table>
								</div>
							</div>
				</div>
					
			</div>
			<div>
				<div class="table-responsive">
						<table class="table" id="cart-summary">
							<tr>
								<td><a type="" href="{{ route('home_app_index')}}" class="btn btn-primary">Tiếp tục mua hàng</a></td>
								<td colspan="3">
										<button type="submit" class="btn btn-success">Đặt hàng</button>
								</td>
							</tr>
						</table>
				</div>
			</div>
				
			</form>
		</div>
	</section>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btnUpdateCart").click(function(e) {
			let quantity = $(this).parent().parent().find("#txtSoLuong").val();
			let id = $(this).data('id');
			$.ajax({
				url: '{{url("cart/update")}}',
				type: "POST",
				dataType: 'json',
				data: {id: id, quantity: quantity, _token: "{{csrf_token()}}"},
				success: function(result) {
					if (result.status == 1) {
						alert(result.message)
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
			let id = $(this).data('id');
			if(confirm("Bạn chắc chắn xóa sản phẩm này?")) {
				$.ajax({
					url: '{{url("cart/remove")}}',
					type: "post",
					data: {id: id, _token: "{{csrf_token()}}"},
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