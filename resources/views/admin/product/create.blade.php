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
		<select name="product_type_id">
			@foreach($product_types as $product_type)
				<option value="{{$product_type->product_type_id}}">{{$product_type->product_type_name}}</option>
			@endforeach
		</select>
	</div>

	{{-- <div class="checkbox">Kích cỡ
		<h3>Kích cỡ</h3>
		<p>Lựa chọn kích cỡ của sản phẩm nếu có</p>
		<form>
			<label>
				<input type="checkbox" name="product_size[]" value="XXS"/>XXS
			</label>
			<label>
				<input type="checkbox" name="product_size[]" value="XS"/>XS
			</label>
			<label>
				<input type="checkbox" name="product_size[]" value="S"/>S	
			</label>
			<label>
				<input type="checkbox" name="product_size[]" value="M"/>M
			</label>
			<label>
				<input type="checkbox" name="product_size[]" value="L"/>L
			</label>
			<label>
				<input type="checkbox" name="product_size[]" value="XL"/>XL
			</label>
			<label>
				<input type="checkbox" name="product_size[]" value="XXL"/>XXL
			</label>	
		</form>
			
	</div> --}}
	

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