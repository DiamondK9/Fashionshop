@extends('index')
@section('content')
<h1><center> <font> Thông tin </font></center></h1>
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
    </figure>
    @empty
    
    @endforelse
</section>

<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">HOME</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>About us</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title about-page-title">About us</h2>
					</div>		
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<!-- SINGLE-ABOUT-INFO START -->
						<div class="single-about-info">
							<div class="our-company">
								<h3>Our company</h3>
								<strong>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididun.</strong>
								<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit.</p>	
								<div class="company-list-menu">
									<ul>
										<li>Top quality products</li>
										<li>Best customer service</li>
										<li>30-days money back guarantee</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- SINGLE-ABOUT-INFO END -->
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="single-about-info">
							<!-- OUR-TEAM START -->
							<div class="our-team">
								<h3>Our team</h3>
								<strong>Lorem set sint occaecat cupidatat non </strong>
								<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
								<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
								<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>	
							</div>
							<!-- OUR-TEAM END -->
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="single-about-info">
							<!-- OUR-TESTIMONIALS START -->
							<div class="our-testimonials">
								<h3>Testimonials</h3>
								<!-- SINGLE-TESTIMONIALS START -->
								<div class="single-testimonials">
									<div class="testimonials-text">
										<span class="before"></span>
										Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
										<span class="after"></span>
									</div>
								</div>
								<p>Lorem ipsum dolor sit</p>
								<!-- SINGLE-TESTIMONIALS END -->
								<!-- SINGLE-TESTIMONIALS START -->
								<div class="single-testimonials">
									<div class="testimonials-text">
										<span class="before"></span>
										Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod.
										<span class="after"></span>
									</div>
								</div>
								<p>Ipsum dolor sit</p>
								<!-- SINGLE-TESTIMONIALS END -->
							</div>
							<!-- OUR-TESTIMONIALS END -->
						</div>
					</div>
				</div>
			</div>
		</section>
