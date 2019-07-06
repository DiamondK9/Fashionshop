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

<form action="{{url('admin/product_type')}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="product_type_name" class="form-control">
	</div>

	{{-- <div class="form-group">
		<label>Hình ảnh</label>
		<input type="file" name="product_type_image" class="form-control">
	</div> --}}

	{{-- <div class="form-group">
		<label>Phân khúc Sản Phẩm</label>
		<select name="product_type_sub">
			@foreach($product_type_subs as $product_type_sub)
				<option value="{{$product_type_sub->product_type_sub_id}}">{{$product_type_sub->product_type_sub_name}}</option>
			@endforeach
		</select>
	</div> --}}
	
	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('product.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection