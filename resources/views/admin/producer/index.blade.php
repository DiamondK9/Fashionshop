@extends("admin.index")
@section('content')
	<a class="btn btn-primary" href="{{url('admin/producer/create')}}">Tạo mới Nhà Cung Cấp</a>
	<table class="table table-striped table-hover">
		<tr>
			<th>ProducerID</th>
			<th>Tên Thương Hiệu</th>
			<th>Hình ảnh</th>
			<th>Số Điện Thoại</th>
			<th>Email</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>

		{{-- @if(isset($producers) && !empty($producers))
			@foreach($producers as $producer)
				<tr>
				<td>{{ $producer->producer_producer_id }}</td>
				<td>{{ $producer->producer_type_producer_id }}</td>
				<td>{{ $producer->producer_producer_id }}</td>
				<td>{{ $producer->producer_code }}</td>
				<td>{{ $producer->producer_producer_name }}</td>
				<td>{{ $producer->producer_producer_image }}</td>
				<td>{{ number_format($producer->producer_producer_phone) }}</td>
				<td>{{ $producer->producer_producer_quantity }}</td>
				<td><a href="{{ route('producer.exit', $producer->producer_id) }}">Chỉnh sửa</a></td>
				<td>Xóa</td>
			</tr>
			@endforeach	
			@else
				<tr>
			    	<td colspan="10">Không dữ liệu</td>
				</tr>
		@endif --}}


		{{-- @forelse($producers as $producer)
			<tr>
				<td>{{ $producer->producer_producer_id }}</td>
				<td>{{ $producer->producer_type_producer_id }}</td>
				<td>{{ $producer->producer_producer_id }}</td>
				<td>{{ $producer->producer_code }}</td>
				<td>{{ $producer->producer_producer_name }}</td>
				<td>{{ $producer->producer_producer_image }}</td>
				<td>{{ number_format($producer->producer_producer_phone) }}</td>
				<td>{{ $producer->producer_producer_quantity }}</td>
				<td><a href="{{ route('producer.edit', $producer->producer_id) }}">Chỉnh sửa</a></td>
				<td>Xóa</td>
			</tr>
		@empty
			<tr>
		    	<td colspan="10">Không dữ liệu</td>
			</tr>
		@endforelse	 --}}

		@forelse($producers as $producer)
			<tr>
				<td>{{$producer->producer_id}}</td>

				{{-- <td{{isset($producer->producer_type) ? $producer->producer_type->producer_name : ""}}></td> --}}

				{{-- <td>{{isset($producer->producer) ? $producer->producer->producer_name : ""}}</td> --}}

				{{-- <td>{{$producer->producer_code }}</td> --}}

				<td>{{$producer->producer_name}}</td>

				<td>
					<img src="{{asset('../storage/app/public/producer/' . $producer->producer_image)}}" width="150" alt="" />
				</td>

				<td>{{number_format($producer->producer_phone)}}</td>

				<td>{{$producer->producer_email}}</td>
				
				
				
				<td>
					<a class="btn btn-success" href="{{route("producer.edit", $producer->producer_id)}}">Chỉnh sửa</a>
				</td>

				<td>
					<button type="button" class="btn btn-danger deleteproducer" data-url="{{route('producer.delete', $producer->producer_id)}}">Xóa</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="10">Không có dữ liệu</td>
			</tr>
		@endforelse
	</table>
	
	<div class="col-md-12 text-center">
		{{$producers->links()}}		
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.deleteproducer').click(function() {
				if(!confirm("Bạn có chắc chắn xóa?")) {
					return false;
				}


				let url = $(this).data('url');
				$.ajax({
					url: url,
					type: "POST",
					data: {
						"_token" : '{{csrf_token()}}', 
						"_method" : "DELETE"
					},
					success : function(result) {
						if(result.message == "success") {
							alert("Xóa thành công");
                           window.location.reload(true);
						}
						else {
							alert("Xóa thất bại");
						}
					},
					error: function(error) {
                        console.log(error);
					}

				});
			});
		});
	</script>
@endsection