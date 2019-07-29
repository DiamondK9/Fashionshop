@extends('admin.index')
@section('content')

<h3>Cập nhật Đơn hàng</h3>

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

<form action="{{route('order.update', $orders->order_id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@method("PUT")
	@csrf

	<div>
        <label for="">Trạng thái Đơn hàng</label>
        <input type="radio" value="1" name="active">Đã hoàn thành
        <input type="radio" value="0" name="active">Đơn mới

    </div>

	<button class="btn btn-success" type="submit">Tạo mới</button>
	<button class="btn btn-warning" type="reset">Nhập lại</button>
	<a href="{{route('order.index')}}" class="btn btn-default">Trở lại</a>
</form>
@endsection