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
                <h2 class="page-title">Đăng nhập</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!-- REGISTERED-ACCOUNT START -->
                <div class="primari-box registered-account">
                <form class="new-account-box" id="accountLogin" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <h3 class="box-subheading">Đăng nhập tài khản</h3>
                        <div class="form-content">
                            <div class="form-group primary-form-group">
                                <label for="loginemail">Email address</label>
                                <input type="text" value="Email đăng nhập" name="email" id="loginemail" class="form-control input-feild">
                            </div>
                            <div class="form-group primary-form-group">
                                <label for="password">Password</label>
                                <input type="password" value="Mật khẩu" name="password" id="password" class="form-control input-feild">
                            </div>
                            <div class="forget-password">
                                <p><a href="#">Quên mật khẩu?</a></p>
                            </div>
                                <button type="submit" class="btn btn-primary">
                                        <span>
                                            <i class="fa fa-lock submit-icon"></i>
                                                Đăng nhập
                                        </span>
                                </button>
                            </div>
                        </div>
                    </form>							
                </div>
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
