@extends("admin.index")
@section('content')
{{--  --}}
	<h3 style="text-align: center;">Thông tin các Đơn Hàng</h3>
	<table class="table table-striped table-hover">
		<tr>
			<th>OrderID</th>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Address</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Total amount</th>
			<th>Active</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>

		@forelse($orders as $order)
			<tr>
				<td>{{$order->order_id}}</td>

				<td>{{ $order->customer_id }}</td>

				<td>{{$order->customer_name}}</td>

				<td>{{$order->customer_phone}}</td>

				<td>{{$order->customer_email}}</td>

				<td>{{$order->customer_address}}</td>

				<td>
					{{ $order->product->product_name }}
				</td>

				{{-- <td>{{isset($product->producer) ? $product->producer->producer_name :""}}</td> --}}

					
				<td>{{number_format($order->product_quantity)}}</td>

				<td>{{number_format($order->total_amount)}}</td>

				<td>{{$order->active==0 ? "Đơn mới" : "Đã hoàn thành"}}</td>
				
				<td>
					<a class="btn btn-success" href="{{route("order.edit", $order->order_id)}}">Chỉnh sửa</a>
				</td>

				<td>
					<button type="button" class="btn btn-danger deleteOrder" data-url="{{route('order.delete', $order->order_id)}}">Xóa</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="10">Không có dữ liệu</td>
			</tr>
		@endforelse
	</table>
	
	<div class="col-md-12 text-center">
		{{$orders->links()}}		
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.deleteOrder').click(function() {
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