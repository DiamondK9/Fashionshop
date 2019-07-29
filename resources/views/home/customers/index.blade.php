@extends('index')
@section('content')
<!-- MAIN-CONTENT-SECTION-Control-account-customer START -->
<section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                    <a href="{{route('home_app_index')}}">HOME</a>
                        <span><i class="fa fa-caret-right	"></i></span>
                        <span>My account</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>

            <div class="row">
                <div class="account-info-text">
                    Chào mừng đến với trang quản lý thông tin của bạn. Bạn có thể thay đổi thông tin cá nhân, giỏ hàng của bạn tại đây.
                </div>
                <!-- ACCOUNT-INFO-TEXT START -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-info">
                        <div class="single-account-info">
                            <ul>
                                <li><a href=""><i class="fa fa-shopping-cart cart-icon"></i><span>Giỏ hàng của bạn</span>	</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-info">
                        <div class="single-account-info">
                            <ul>
                                <li><a href=""><i class="fa fa-user submit-icon"></i><span>Thông tin cá nhân</span>	</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="create-new-account">
                        <table class="table table-bordered" id="cart-summary">
                            <tr>
                                <th class="cart-product">Tên đăng nhập:</th>
                            <th class="cart-description">saddfghjkkkjkh</th>
                            </tr>
                            <tr>
                                <th class="cart-product">Email:</th>
                                <th class="cart-description">admin@gmail.com</th>
                            </tr>
                            <tr>
                                <th class="cart-product">Số điện thoại</th>
                                <th class="cart-description">876542</th>
                            </tr>
                            <tr>
                                <th class="cart-product">Địa chỉ</th>
                                <th class="cart-description">asdfghj ssdfhgjh fdgdfdhf</th>
                            </tr>
                            <tr>
                                <th class="cart-product" colspan="2"><a href="" class="btn btn-primary">Thay đổi thông tin cá nhân</a></th>
                            </tr>
                        </table>			
                    </div>
                </div>

                <!-- ACCOUNT-INFO-TEXT END -->
            </div>
        </div>
        </div>
    </section>
<!-- MAIN-CONTENT-SECTION-Control-account-customer end -->

@endsection
