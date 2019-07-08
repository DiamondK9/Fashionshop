@extends("admin.index")
@section('content')
	<a class="btn btn-primary" href="{{url('admin/product/create')}}">Tạo mới Sản phẩm</a>
	<table class="table table-striped table-hover">
		<tr>
			<th>ProductID</th>
			<th>Loại Sản phẩm</th>
			<th>Nhà cung cấp</th>
			<th>Mã sản phẩm</th>
			<th>Tên</th>
			<th>Hình ảnh</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>

		{{-- @if(isset($products) && !empty($products))
			@foreach($products as $product)
				<tr>
				<td>{{ $product->product_product_id }}</td>
				<td>{{ $product->product_type_product_id }}</td>
				<td>{{ $product->producer_product_id }}</td>
				<td>{{ $product->product_code }}</td>
				<td>{{ $product->product_product_name }}</td>
				<td>{{ $product->product_product_image }}</td>
				<td>{{ number_format($product->product_product_price) }}</td>
				<td>{{ $product->product_product_quantity }}</td>
				<td><a href="{{ route('product.exit', $product->product_id) }}">Chỉnh sửa</a></td>
				<td>Xóa</td>
			</tr>
			@endforeach	
			@else
				<tr>
			    	<td colspan="10">Không dữ liệu</td>
				</tr>
		@endif --}}


		{{-- @forelse($products as $product)
			<tr>
				<td>{{ $product->product_product_id }}</td>
				<td>{{ $product->product_type_product_id }}</td>
				<td>{{ $product->producer_product_id }}</td>
				<td>{{ $product->product_code }}</td>
				<td>{{ $product->product_product_name }}</td>
				<td>{{ $product->product_product_image }}</td>
				<td>{{ number_format($product->product_product_price) }}</td>
				<td>{{ $product->product_product_quantity }}</td>
				<td><a href="{{ route('product.edit', $product->product_id) }}">Chỉnh sửa</a></td>
				<td>Xóa</td>
			</tr>
		@empty
			<tr>
		    	<td colspan="10">Không dữ liệu</td>
			</tr>
		@endforelse	 --}}

		@forelse($products as $product)
			<tr>
				<td>{{$product->product_id}}</td>

				<td>{{isset($product->product_type) ? $product->product_type->product_type_name : ""}}</td>

				<td>{{isset($product->producer) ? $product->producer->producer_name :""}}</td>

				<td>{{$product->product_code }}</td>

				<td>{{$product->product_name}}</td>

				<td>
					<img src="{{asset('../storage/app/public/product/' . $product->product_image)}}" width="150" alt="" />
				</td>

				<td>{{number_format($product->product_price)}}</td>

				<td>{{$product->product_quantity}}</td>
				
				
				
				<td>
					<a class="btn btn-success" href="{{route("product.edit", $product->product_id)}}">Chỉnh sửa</a>
				</td>

				<td>
					<button type="button" class="btn btn-danger deleteProduct" data-url="{{route('product.delete', $product->product_id)}}">Xóa</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="10">Không có dữ liệu</td>
			</tr>
		@endforelse
	</table>
	
	<div class="col-md-12 text-center">
		{{$products->links()}}		
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