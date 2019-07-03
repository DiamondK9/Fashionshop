@extends('index')
@section('content')
<h2>Sách mới</h2>
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
    noi nay de phan trang
</section>
@endsection
