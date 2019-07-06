@extends('admin.index')
@section('content')

<h3>Tạo mới sản phẩm</h3>

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

<form action="{{url('admin/product')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="product_name" class="form-control">
	</div>

	<div class="form-group">
		<label>Mã sản phẩm</label>
		<input type="text" name="product_code" class="form-control">
	</div>

	<div class="form-group">
		<label>Loại Sản Phẩm</label>
		<select name="producttype_id">
			@foreach($producttypes as $producttype)
				<option value="{{$producttype->producttype_id}}">{{$producttype->producttype_name}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Nhà cung cấp</label>
		<select name="producer_id">
			@foreach($producers as $producer)
				<option value="{{$producer->producer_id}}">{{$producer->producer_name}}</option>
			@endforeach
		</select>
	</div>

	
	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="product_image" class="form-control">
	</div>
	<div class="form-group">
		<label>Số lượng</label>
		<input type="number" name="product_quantity" class="form-control">
	</div>
	<div class="form-group">
		<label>Giá</label>
		<input type="number" name="product_price" class="form-control">
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
	<a href="{{route('product.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection