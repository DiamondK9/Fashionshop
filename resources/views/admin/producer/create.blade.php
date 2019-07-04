@extends('admin.index')
@section('content')

<h3>Tạo mới Nhà Cung Cấp</h3>

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

<form action="{{url('admin/producer')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="producer_name" class="form-control">
	</div>

	{{-- <div class="form-group">
		<label>Mã sản phẩm</label>
		<input type="text" name="producer_code" class="form-control">
	</div> --}}

	{{-- <div class="form-group">
		<label>Loại Sản Phẩm</label>
		<select name="producer_type">
			@foreach($producer_types as $producer_type)
				<option value="{{$producer_type->producer_type_id}}">{{$producer_type->producer_type_name}}</option>
			@endforeach
		</select>
	</div> --}}

	{{-- <div class="form-group">
		<label>Nhà cung cấp</label>
		<select name="producer">
			@foreach($producers as $producer)
				<option value="{{$producer->producer_id}}">{{$producer->producer_name}}</option>
			@endforeach
		</select>
	</div> --}}

	
	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="producer_image" class="form-control">
	</div>
	<div class="form-group">
		<label>Số Điện thoại</label>
		<input type="number" name="producer_phone" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="producer_email" class="form-control">
	</div>
	
	{{-- <div class="form-group">
		<label>Nhà sản xuất</label>
		<select name="producer_id">
			@foreach($producers as $producer)
				<option value="{{$producer->id}}">{{$producer->name}}</option>
			@endforeach
		</select>
	</div> --}}
	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('producer.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection