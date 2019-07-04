@extends('admin.index')
@section('content')

<h3>Cập nhập thông tin Nhà Cung Cấp</h3>

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

<form action="{{route('producer.update', $producer->producer_id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@method("PUT")
	@csrf

	<div class="form-group">
		<label>Tên Thương Hiệu</label>
		<input type="text" value="{{$producer->producer_name}}" name="producer_name" class="form-control">
	</div>

	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="producer_image" class="form-control">
		<img src="{{asset('storage/producer/' . $producer->producer_image)}}" width="150" alt="" />
	</div>

	<div class="form-group">
		<label>Số Điện thoại</label>
		<input type="number" value="{{$producer->producer_phone}}" name="producer_phone" class="form-control">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" value="{{$producer->producer_email}}" name="producer_email" class="form-control">
	</div>


	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('producer.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection