@extends("admin.index")
@section('content')
	<a class="btn btn-primary" href="{{url('admin/product_type/create')}}">Tạo mới Loại Sản Phẩm</a>
	<table class="table table-striped table-hover">
		<tr>
			<th>ID Loại Sản Phẩm</th>
			<th>Tên loại Sản Phẩm</th>
			<th>Hình ảnh đại diện</th>
			<th>Phân khúc sản Phẩm</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>

		@forelse($product_types as $product_type)
			<tr>
				<td>{{$product_type->product_type_id}}</td>

				<td>{{$product_type->product_type_name}}</td>

				<td>
					<img src="{{asset('../storage/app/public/product_type/' . $product_type->product_type_image)}}" width="150" alt="" />
				</td>


				<td>{{isset($product_type->product_type_sub) ? $product_type->product_type_sub->product_type_sub_name :''}}</td>
				
				
				
				<td>
					<a class="btn btn-success" href="{{route("product_type.edit", $product_type->product_type_id)}}">Chỉnh sửa</a>
				</td>

				<td>
					<button type="button" class="btn btn-danger deleteproduct_type" data-url="{{route('product_type.delete', $product_type->product_type_id)}}">Xóa</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="10">Không có dữ liệu</td>
			</tr>
		@endforelse
	</table>
	
	<div class="col-md-12 text-center">
		{{$product_types->links()}}		
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.deleteproduct_type').click(function() {
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