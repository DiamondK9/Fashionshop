@extends('admin.index')
@section('content')
  <h3 align="center" style="font-size: 40px;"><strong>Chào mừng bạn tới Trang Quản trị Admin của BStore</strong></h3>
  {{-- <div class="row">
		<div class="col-md-4 img-thumbnail" style="width: 30%; height: 200px;">
				<h1 align="center"  style="font-family: TimeNewRoman; font-weight: bold; font-size: 20px;">Sản phẩm bán chạy</h1>
				<p align="center"><a href="">Sản phẩm 01</a></p>
				<p align="center"><a href="">Sản phẩm 02</a></p>
				<p align="center"><a href="">Sản phẩm 03</a></p>
				<p align="center"><a href="">Sản phẩm 04</a></p>
		</div>
		<div class="col-md-4 img-thumbnail" style="width: 40%; height: 200px;">
				<h2 align="center"  style="font-family: TimeNewRoman; font-weight: bold; font-size: 20px;">Khách hàng mua nhiều</h2>
				<p align="center"><a href="">Khách hàng 01</a></p>
				<p align="center"><a href="">Khách hàng 02</a></p>
				<p align="center"><a href="">Khách hàng 03</a></p>
				<p align="center"><a href="">Khách hàng 04</a></p>
		</div>
		<div class="col-md-4 img-thumbnail" style="width: 30%; height: 200px;">
				<h3 align="center"  style="font-family: TimeNewRoman; font-weight: bold; font-size: 20px;">Hiển thị đơn hàng</h3>
				@forelse ($orders as $item)
					<p align="center"><a href="">Đơn hàng {{$item->id}}</a></p>
				@empty
					<p align="center">Không có đơn hàng nào</p>
				@endforelse
				<div class="col-md-12 text-center">
						{{$trees->links()}}
				</div>
		</div>
		
	</div> --}}
	<div class="row">
		<div class="col-md-8 img-thumbnail" style="width: 70%; height: auto;">
			<h3 align="center"  style="font-weight: bold; font-size: 20px;">Sản phẩm đang hot</h3>
			<table class="table table-stiped" style="font-family: TimeNewRoman;">
				<tr>
					<th>Tên</th>
					<th>Hình ảnh</th>
					<th>Loại sản phẩm</th>
					<th>Số lượng</th>
					<th>Thương hiệu</th>
				</tr>
				@forelse ($products as $item)
				<tr>
					<td>{{$item->product_name}}</td>
					<td><img src="{{asset('../storage/app/public/product/' . $item->product_image)}}" width="70"/></td>
					<td>{{isset($item->product_type) ? $item->product_type->product_type_name : ""}}</td>
					<td>{{$item->product_quantity}}</td>
					<td>{{isset($item->producer) ? $item->producer->producer_name : ""}}</td>
				</tr>
				@empty
				@endforelse
				<tr>
					<td colspan="5">
						<div class="col-md-12 text-center">
								{{$products->links()}}
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><a href="{{route('product.index')}}" class="btn btn-warning">Trang Quản Lý Sản phẩm</a></td>
					<td></td>
					<td colspan="2"><a href="{{url('admin/product/create')}}" class="btn btn-primary">Thêm sản phẩm nhanh</a></td>
				</tr>
			</table>
			
		</div>
		<div class="col-md-4 img-thumbnail" style="width: 30%; height: 300px;">
				<h5 align="center"  style="font-family: TimeNewRoman; font-weight: bold; font-size: 20px;">Dịch vụ tư vấn</h5>
		</div>
	</div>
@endsection