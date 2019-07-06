@extends('admin.index')
@section('content')

<h3>Tạo mới Loại Sản Phẩm</h3>

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

<form action="{{url('admin/producttype')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="producttype_name" class="form-control">
	</div>

	<div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="product_image" class="form-control">
	</div>

	{{-- <div class="form-group">
		<label>Phân khúc Sản Phẩm</label>
		<select name="producttype_sub">
			@foreach($producttype_subs as $producttype_sub)
				<option value="{{$producttype_sub->producttype_sub_id}}">{{$producttype_sub->producttype_sub_name}}</option>
			@endforeach
		</select>
	</div> --}}
	
	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('product.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection