@extends('admin.index')
@section('content')
<div class="row">
		<div class="col-md-8 img-thumbnail" style="font-family: Arial;">
				<h3>TẠO TÀI KHOẢN KHÁCH HÀNG</h3>
				@if($errors->any())
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>  
				@endif
				
					<form action="{{url('admin/customer')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
						@csrf
						<div>
							<label>Tên</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div>
							<label>Mật khẩu</label>
							<input type="password" name="image" class="form-control">
						</div>
						<div>
							<label>Số điện thoại</label>
							<input type="text" name="phone" class="form-control">
						</div>
						<div>
							<label>Email</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div>
							<label>Địa chỉ</label>
							<input type="text" name="address" class="form-control">
						</div>
						<div>
                                <label for="active">Active</label>
                                <input type="radio" value="1">Kích hoạt
                                <input type="radio" value="0">Không kích hoạt
                            </div>
						<button class="btn btn-success" type="submit">Tạo mới</button>
						<button class="btn btn-wrarning" type="reset">Nhập lại</button>
						<a href="{{url('admin/customer')}}" class="btn btn-success">Trở lại</a>
					</form>
		</div>
		<div class="col-md-4 img-thumbnail" style="font-family: Arial; width: 30%; height: 600px;">
			
		</div>
	</div>

@endsection