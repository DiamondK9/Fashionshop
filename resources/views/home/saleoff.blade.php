@extends('index')
@section('content')
<h2>Khuyến Mãi</h2>
<section class="grid-holder features-books">
    @forelse($products as $product)
    <figure class="span4 slide first chinh1" style="position: relative;">
        <a href="#"><img src="{{asset('storage/product/' . $product->product_image)}}" alt="" class="pro-img"/></a>
        <p>
            <span class="title">
                <a href="" style="font-weight: bold">{{$product->product_name}}</a>
            </span>
        </p>
        <p>Loại Sản phẩm:
            @isset($product->product_type)
            <a class="ncc" href="">{{$product->product_type->product_type_name}}</a>
            @else
            N/A
            @endisset
        </p>
        <p>Nhà Cung cấp:
            @if(isset($product->producer))
            <a class="ncc" href="#">{{$product->producer->producer_name}}</a>
            @else
            N/A
            @endif
        </p>
        {{-- <p>
            <i class="fa fa-eye" aria-hidden="true"></i> Lượt xem:  12
        </p> --}}
        <div class="cart-price">
            <a class="cart-btn2" href="#">Thêm vào giỏ hàng</a>
            <span class="price">{{number_format($product->product_price)}} đ</span>
        </div>
    </figure>
    @empty
    
    @endforelse
</section>
<div style="clear: both;"></div>
<section class="grid-holder features-books">

        <style type="text/css">
        
            body {
                margin:0;
                padding:0;
                font-family: Sans-Serif;
                line-height: 1.5em;
            }
            
            header {
                background: #ccc;
                height: 100px;
            }
            
            header h1 {
                margin: 0;
                padding-top: 15px;
            }
            
            main {
                padding-bottom: 10010px;
                margin-bottom: -10000px;
                float: left;
                width: 100%;
            }
            
            nav {
                padding-bottom: 10010px;
                margin-bottom: -10000px;
                float: left;
                width: 230px;
                margin-left: -230px;
                background: #eee;
            }
            
            footer {
                clear: left;
                width: 100%;
                background: #ccc;
                text-align: center;
                padding: 4px 0;
            }
    
            #wrapper {
                overflow: hidden;
            }
                        
            #content {
                margin-right: 230px; /* Same as 'nav' width */
            }
            
            .innertube {
                margin: 15px; /* Padding for content */
                margin-top: 0;
            }
        
            p {
                color: #555;
            }
    
            nav ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            
            nav ul a {
                color: darkgreen;
                text-decoration: none;
            }
        
        </style>        
        
    <div id="wrapper">
    
        <main>
            <div id="content">
                <div class="innertube">
                    <h1>Gian hàng 1</h1>
                    This, too, will pass. If the facts don't fit the theory, change the facts. The past has no power over the present moment. 

                    <h3>Gian hàng 1</h3>
                    <p>The most important moment of your life is now. The most important person in your life is the one you are with now, and the most important activity in your life is the one you are involved with now. The past has no power over the present moment. </p>

                    <h3>Gian hàng 1</h3>
                    <p>The most important moment of your life is now. The most important person in your life is the one you are with now, and the most important activity in your life is the one you are involved with now. The smaller your reality, the more convinced you are that you know everything. This, too, will pass. Peace comes from within. Do not seek it without. </p>

                    <h3>Gian hàng 1</h3>
                    <p>The most important moment of your life is now. The most important person in your life is the one you are with now, and the most important activity in your life is the one you are involved with now. </p>
                    <p>You will not be punished for your anger, you will be punished by your anger. The past has no power over the present moment. </p>
                    <p>You will not be punished for your anger, you will be punished by your anger. </p>
                    
                    <h3>Gian hàng 1</h3>
                    <p>The most important moment of your life is now. The most important person in your life is the one you are with now, and the most important activity in your life is the one you are involved with now. Peace comes from within. Do not seek it without. This, too, will pass. </p>
                    <p>You will not be punished for your anger, you will be punished by your anger. The smaller your reality, the more convinced you are that you know everything. If the facts don't fit the theory, change the facts. The past has no power over the present moment. </p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
</section>
@endsection
