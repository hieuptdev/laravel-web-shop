<div class="colorlib-loader"></div>
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="/">Fashion</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="@yield('index')"><a href="/">Trang chủ</a></li>
                            <li class="has-dropdown @yield('product')">
                                <a href="/product/shop">Cửa hàng</a>
                                <ul class="dropdown">
                                    <li class="@yield('cart')"><a href="/cart">Giỏ hàng</a></li>
                                    <li class="@yield('cart')"><a href="/checkout">Thanh toán</a></li>

                                </ul>
                            </li>
                            <li class="@yield('about')"><a href="/about">Giới thiệu</a></li>
                            <li class="@yield('contact')"><a href="/contact">Liên hệ</a></li>
                            <li class="@yield('cart')"><a href="/cart"><i class="icon-shopping-cart"></i> Giỏ hàng
                                    [<span style="color: red">{{Cart::content()->count()}}</span>]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
