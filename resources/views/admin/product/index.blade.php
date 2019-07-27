@extends("admin.index")
@section('content')
	<a class="btn btn-primary" href="{{url('admin/product/create')}}">Tạo mới Sản phẩm</a>
	<table class="table table-striped table-hover">
		<tr>
			<th>OrderID</th>
			<th>Tên KH</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Tên SP</th>
			<th>Địa chỉ giao hàng</th>
			<th>Số lượng SP</th>
			<th>Thành tiền</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>

		@forelse($orders as $item)
			<tr>
				<td>{{$item->order_id}}</td>

				<td>{{isset($item->user) ? $item->user->user_name : ""}}</td>

				<td>{{isset($item->producer) ? $item->producer->producer_name :""}}</td>

				<td>{{$item->product_code }}</td>

				<td>{{$item->product_name}}</td>

				<td>
					<img src="{{asset('../storage/app/public/product/' . $item->product_image)}}" width="150" alt="" />
				</td>

				<td>{{number_format($item->product_price)}}</td>

				<td>{{$item->product_quantity}}</td>
				
				
				
				<td>
					<a class="btn btn-success" href="{{route("product.edit", $item->product_id)}}">Chỉnh sửa</a>
				</td>

				<td>
					<button type="button" class="btn btn-danger deleteProduct" data-url="{{route('product.delete', $item->product_id)}}">Xóa</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="10">Không có dữ liệu</td>
			</tr>
		@endforelse
	</table>
	
	<div class="col-md-12 text-center">
		{{$items->links()}}		
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.deleteProduct').click(function() {
				if(!confirm("Bạn có chắc chắn xóa?")) {
					return false;
				}


				let url = $(this).data('url');
				$.ajax({
					url: url,
					type: "POST",
					data: {
						"_token" : '{{csrf_token()}}', 
						"_method" : "DELETE"
					},
					success : function(result) {
						if(result.message == "success") {
							alert("Xóa thành công");
                           window.location.reload(true);
						}
						else {
							alert("Xóa thất bại");
						}
					},
					error: function(error) {
                        console.log(error);
					}

				});
			});
		});
	</script>
@endsection