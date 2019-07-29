@extends('admin.index')
@section('content')
<!------->
<nav class="navbar navbar-default">
	<div class="container-fluid">
			<h3 style="text-align: center;">QUẢN LÝ TÀI KHOẢN KHÁCH HÀNG</h3>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left" role="search">
			<a class="btn btn-primary" href="{{route('customer.create')}}">Thêm thông tin khách hàng</a>
				<div class="form-group">
					<input type="text" class="form-control col-sm-12" placeholder="Tìm kiếm ..." id="txtKeyword" value="">
				</div>
					<a id="btnSearch" class="btn btn-primary">Tìm kiếm</a>
					
			</form>
		</div>
	</div>
</nav>
<!----->
{{-- <a class="btn btn-primary" href="{{url('admin/banner/create')}}">Tạo mới banner</a><br> --}}
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
	<table class="table table-bordered table-hover">
		<tr>
			<th>ID</th>
			<th>Tên khách hàng</th>
			<th>Pass</th>
			<th>số điện thoại</th>
			<th>Email</th>
			<th>Địa chỉ</th>
			<th>Mã đơn hàng</th>
			<th>Mã sản phẩm mua</th>
			<th>Active</th>
			<th>Sửa</th>
			<th>Xóa</th>
			<th>Ngày tạo</th>
			<th>Ngày sửa</th>
		</tr>
		@forelse($customers as $customer)
		
		{{-- Tuong duong với:
		@if(isset($banners) && !empty($banner))
		@foreach()
		@endforeach
		@endif --}}
		<tr>
			<td>{{$customer->customer_id}}</td>
			<td>{{$customer->customer_name}}</td>
			<td>{{$customer->customer_password}}</td>
			<td>{{$customer->customer_phone}}</td>
			<td>{{$customer->customer_email}}</td>
			<td>{{$customer->customer_address}}</td>
			<td></td>
			<td>{{$customer->active==1 ? "Hoạt động" : "Không hoạt động" }}</td>
			<td>{{$customer->active}}</td>
			<td><a href="{{route("customer.edit", $customer->customer_id)}}" class="btn btn-primary">Edit</a></td>
			<td>
			<button type="button" class="btn btn-danger DeleteCustomer" data-url="{{route('customer.delete', $customer->customer_id)}}">Delete</button>
			</td>
			<td>{{$customer->created_at}}</td>
			<td>{{$customer->updated_at}}</td>
		</tr>
		@empty
		<tr>
			<td colspan="7">Không có dữ liệu</td>
			
		</tr>
		@endforelse
		
	</table>
	
	<div class="col-md-12 text-center">
		{{$customers->links()}}
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.DeleteCustomer').click(function(){
				if(!confirm("Bạn chắc chắn muốn xóa thông tin khách hàng này?")){
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