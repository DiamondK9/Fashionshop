@extends('index')
@section('content')


    <div id="right">
        <section class="b-detail-holder">
            <article class="title-holder">
                <div class="span6">
                    <h2>Đồng Hồ Đeo Tay</h2>
                </div>
            </article>
            <div class="book-i-caption">
                <div class="span6 b-img-holder">
                    <span class='zoom' id='ex1'> <img src='' height="219" width="300" id='jack' alt=''/></span>
                </div>
                <div class="span6">
                    <strong class="title">Tổng quan</strong>
                    <p class="text_chi_tiet">Nhà Sản Xuất <a href="">1</a></p>
                    <p class="text_chi_tiet">Số Lượng: 240</p>
                    <p class="text_chi_tiet">Giá bán: <span class="giamoi_chitiet">2,000$</span></p>
                    <div class="comm-nav">
                        <strong class="title2">Số lượng mua</strong>
                        <ul><form method="POST" action="">
                                <li><input name="txtSoLuong" class="txtSoLuong" type="text" value="1" required pattern="[0-9]{1,3}" title="Số lượng phải là số và nhỏ hơn 4 kí tự"/></li>
                            <li><input type="submit" value="Thêm vào giỏ hàng" class="more-btn"/></li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <section class="related-book">
                <div class="heading-bar">
                    <h2>Sản Phẩm liên quan</h2>
                    <span class="h-line"></span>
                </div>
                <div class="slider6">
                    <div class="slide">
                        <a href=""><img src="" alt="" class="pro-img"/></a>
                        <h4><a href="">Túi Xách</a></h4>
                        <div class="cart-price">
                            <a class="cart-btn2" href="?cn=giohang">Add to Cart</a>
                            <span class="price">1,200$</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="reviews-section">
                <figure class="left-sec">
                    <div class="r-title-bar">
                        <strong>Hỏi, Đáp Về Sản Phẩm</strong>
                    </div>
                    <ul class="review-list">
                        <li>
                            <input name="" type="text" placeholder="Hãy đặt câu hỏi..."/>
                        </li>
                        <p>Các câu hỏi thường gặp về sản phẩm:</p>
                        <p>- Chế độ bảo hành cùng cách thức vận chuyển sản phẩm này thế nào?</p>
                        <p>- Kích thước sản phẩm này ?</p>
                        <p>- Sản phẩm này có dễ dùng không ?</p>
                        <p><span>Các câu hỏi liên quan đến sản phẩm hư hỏng, cần đổi trả, v.v ... vui lòng truy cập trang hỗ trợ</span></p>
                    </ul>
                    <a href="#" class="grey-btn">Gửi câu hỏi</a>
                </figure>
            </section>
        </section>
        <section>
            <div>
                <div class="fb-comments" data-width="100%" data-numposts="5"></div>
            </div>
        </section>
    </div>
@endsection
