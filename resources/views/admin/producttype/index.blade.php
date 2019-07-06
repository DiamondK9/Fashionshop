@extends("admin.index")
@section('content')
	<a class="btn btn-primary" href="{{url('admin/producttype/create')}}">Tạo mới Loại Sản Phẩm</a>
	<table class="table table-striped table-hover">
		<tr>
			<th>Producttype ID</th>
			<th>Tên loại Sản Phẩm</th>
			<th>Hình ảnh đại diện</th>
			<th>Phân khúc sản Phẩm</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>

		@forelse($producttypes as $producttype)
			<tr>
				<td>{{$producttype->producttype_id}}</td>

				<td>{{$producttype->producttype_name}}</td>

				<td>
					<img src="{{asset('../storage/app/public/producttype/' . $producttype->producttype_image)}}" width="150" alt="" />
				</td>


				<td>{{isset($producttype->producttype_sub) ? $producttype->producttype_sub->producttype_sub_name :''}}</td>
				
				
				
				<td>
					<a class="btn btn-success" href="{{route("producttype.edit", $producttype->producttype_id)}}">Chỉnh sửa</a>
				</td>

				<td>
					<button type="button" class="btn btn-danger deleteproducttype" data-url="{{route('producttype.delete', $producttype->producttype_id)}}">Xóa</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="10">Không có dữ liệu</td>
			</tr>
		@endforelse
	</table>
	
	<div class="col-md-12 text-center">
		{{$producttypes->links()}}		
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.deleteproducttype').click(function() {
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