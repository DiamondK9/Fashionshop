@extends('admin.index')
@section('content')
<div class="row">
        
        <div class="col-md-8 img-thumbnail" style="font-family: Arial;">
                <h4 align="center">Thay đổi thông tin khách hàng</h4>
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
                
            <form action="{{route('customer.update', $customers->customer_id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div>
                            <label>Tên</label>
                        <input type="text" name="name" class="form-control" value="{{$customers->customer_name}}">
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" value="">
                        </div>
                        <div>
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{$customers->customer_phone}}">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{$customers->customer_email}}">
                        </div>
                        <div>
                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="{{$customers->customer_address}}">
                        </div>
                        <div>
                            <label for="active">Active</label>
                            <input type="radio" value="1">Kích hoạt
                            <input type="radio" value="0">Không kích hoạt
                        </div>
                        <button class="btn btn-success" type="submit">Cập nhật</button>
                        <button class="btn btn-wrarning" type="reset">Nhập lại</button>
                        <a href="{{url('admin/customer')}}" class="btn btn-success">Trở lại</a>
                    </form>
        </div>
        <div class="col-md-4 img-thumbnail" style="font-family: Arial; width: 30%; height: 600px;">
            
        </div>
    </div>

@endsection