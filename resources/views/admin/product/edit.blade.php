@extends('admin.index')
@section('content')

<h3>Cập nhật thông tin sản phẩm</h3>

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

<form action="{{route('product.update', $product->product_id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@method("PUT")
	@csrf

	<div class="form-group">
		<label>Tên</label>
		<input type="text" value="{{$product->product_name}}" name="product_name" class="form-control">
	</div>

	<div class="form-group">
		<label>Mã Sản Phẩm</label>
		<input type="text" value="{{$product->product_code}}" name="product_code" class="form-control">
	</div>

	<div class="form-group">
		<label>Loại Sản Phẩm</label>
		<select name="producttype_id">
			@foreach($producttypes as $producttype)
				<option {{$producttype->producttype_id == $product->producttype_id ? "selected" : ''}} value="{{$producttype->producttype_id}}">{{$producttype->name}}</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group">
		<label>Nhà Cung cấp</label>
		<select name="producer_id">
			@foreach($producers as $producer)
				<option {{$producer->producer_id == $product->producer_id ? "selected" : ''}} value="{{$producer->producer_id}}">{{$producer->producer_name}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="product_image" class="form-control">
		<img src="{{asset('storage/product/' . $product->product_image)}}" width="150" alt="" />
	</div>

	<div class="form-group">
		<label>Số lượng</label>
		<input type="number" value="{{$product->product_quantity}}" name="product_quantity" class="form-control">
	</div>

	<div class="form-group">
		<label>Giá</label>
		<input type="number" value="{{$product->product_price}}" name="product_price" class="form-control">
	</div>


	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('product.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection