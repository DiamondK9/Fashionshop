@extends('index')
@section('content')
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				
<!-- Code form đăng nhập,đăng kí -->
<aside>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="{{route('home_app_index')}}">Trang chủ</a>
                    <span><i class="fa fa-caret-right"></i></span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="page-title">Đăng kí</h2>
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
                @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!-- CREATE-NEW-ACCOUNT START -->
                <div class="create-new-account">
                    <form action="{{url('customers')}}" class="new-account-box primari-box" id="create-new-account" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3 class="box-subheading">Bạn chưa có tài khoản</h3>
                        <div class="form-content">
                            <p>Hãy nhập thông tin đăng kí tài khoản tại đây</p>
                            <p style="">Mọi thông tin của quý khách sẽ được cam kết bảo mật</p>
                            <div class="form-group primary-form-group">
                                    <label for="name">Họ tên</label>
                                    <input type="text" value="Họ tên" name="name" id="name" class="form-control input-feild" required>
                                </div>
                            <div class="form-group primary-form-group">
                                <label for="name">Use</label>
                                <input type="text" value="Tên đăng nhập" name="name" id="name" class="form-control input-feild" required>
                            </div>
                            <div class="form-group primary-form-group">
                                <label for="password">Password</label>
                                <input type="password" value="Mật khẩu" name="password" id="password" class="form-control input-feild" required>
                            </div>
                            <div class="form-group primary-form-group">
                                <label for="phone">Phone</label>
                                <input type="text" value="Số điện thoại" name="phone" id="phone" class="form-control input-feild" required>
                            </div>
                            <div class="form-group primary-form-group">
                                <label for="email">Email address</label>
                                <input type="text" value="Enail" name="email" id="email" class="form-control input-feild" required>
                            </div>
                            <div class="submit-button">
                                <button type="submit" class="btn btn-primary">
                                        <span>
                                            <i class="fa fa-user submit-icon"></i>
                                            Tạo tài khoản
                                        </span>	
                                </button>
                                <button type="reset" class="btn btn-danger">Reset</button>     										
                            </div>
                        </div>
                    </form>							
                </div>
                <!-- CREATE-NEW-ACCOUNT END -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               
                <!-- REGISTERED-ACCOUNT END -->
            </div>
        </div>
    </div>
</aside>			
<!--code form dang nhap, dang ki -->
			</div>
		</section>
<!-- MAIN-CONTENT-SECTION END -->
@endsection
