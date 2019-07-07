@extends('admin.index')
@section('content')

<h3>Thay đổi thông tin phân loại</h3>

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

<form action="{{route('product_type.update', $product_type->product_type_id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@method("PUT")
	@csrf

	<div class="form-group">
		<label>Tên Phân loại</label>
		<input type="text" value="{{$product_type->product_type_name}}" name="product_type_name" class="form-control">
	</div>

	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="product_type_image" class="form-control">
		<img src="{{asset('storage/product_type/' . $product_type->product_type_image)}}" width="150" alt="" />
	</div>

	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('product_type.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection