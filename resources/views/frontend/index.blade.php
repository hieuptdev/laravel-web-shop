@extends('frontend.master.master')
@section('content')
@section('title','Trang chủ')
	
<aside id="colorlib-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(images/img_bg_1.jpg);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner">
								<div class="desc">
									<h1 class="head-1">Sale</h1>
									<h2 class="head-3">45%</h2>
									<p class="category"><span>Nhưng mẫu thiết kế chuyên nghiệp</span></p>
									<p><a href="/product/shop" class="btn btn-primary">Kết nối với shop</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/img_bg_2.jpg);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner">
								<div class="desc">
									<h1 class="head-1">Sale</h1>
									<h2 class="head-3">45%</h2>
									<p class="category"><span>Nhưng mẫu thiết kế chuyên nghiệp</span></p>
									<p><a href="/product/shop" class="btn btn-primary">Kết nối với shop</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/img_bg_3.jpg);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner">
								<div class="desc">
									<h1 class="head-1">Sale</h1>
									<h2 class="head-3">45%</h2>
									<p class="category"><span>Nhưng mẫu thiết kế chuyên nghiệp</span></p>
									<p><a href="/product/shop" class="btn btn-primary">Kết nối với shop</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>
<div id="colorlib-featured-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="/product/shop" class="f-product-1" style="background-image: url(images/item-1.jpg);">
					<div class="desc">
						<h2>Mẫu <br>cho <br>Nam</h2>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<a href="/product/shop" class="f-product-2" style="background-image: url(images/item-2.jpg);">
							<div class="desc">
								<h2> <br>Váy <br> Mới</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="/product/shop" class="f-product-2" style="background-image: url(images/item-4.jpg);">
							<div class="desc">
								<h2>Sale <br>20% <br>off</h2>
							</div>
						</a>
					</div>
					<div class="col-md-12">
						<a href="/product/shop" class="f-product-2" style="background-image: url(images/item-3.jpg);">
							<div class="desc">
								<h2>Giầy <br>cho <br>Nam</h2>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);"
 data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="intro-desc">
					<div class="text-salebox">
						<div class="text-lefts">
							<div class="sale-box">
								<div class="sale-box-top">
									<h2 class="number">45</h2>
									<span class="sup-1">%</span>
									<span class="sup-2">Off</span>
								</div>
								<h2 class="text-sale">Sale</h2>
							</div>
						</div>
						<div class="text-rights">
							<h3 class="title">Dặt hàng hôm nay,nhận ngay khuyến mãi!</h3>
							<p>Đã có hơn 1000 đơn hàng được gửi đi ở khắp quốc gia.</p>
							<p><a href="shop.html" class="btn btn-primary">Mua ngay</a> <a href="#" class="btn btn-primary btn-outline">Đọc
									thêm</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Sản phẩm Nổi bật</span></h2>
				<p>Đây là những sản phẩm được ưa chuộng nhất năm 2019</p>
			</div>
		</div>
		<div class="row">
			@foreach($product as $rows)
			@if($rows->featured==1)
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(/backend/img/{{ $rows->img }});">
						<p class="tag"><span class="new">New</span></p>
						<div class="cart">
							<p>
								
								<span class="addtocart"><a href="/cart"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="/product/detail/{{ $rows->id }}"><i class="icon-eye"></i></a></span>


							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="/product/detail/{{ $rows->id }}">{{ $rows->name }}</a></h3>
						<p class="price"><span>{{ number_format($rows->price,0,'','.') }} VND</span></p>
					</div>
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</div>
<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Sản phẩm mới</span></h2>
				<p>Đây là những sản phẩm mới của năm năm 2019</p>
			</div>
		</div>
		<div class="row">
		@foreach($product as $rows)
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(/backend/img/{{ $rows->img }});">

						<div class="cart">
							<p>
								<span class="addtocart"><a href="/cart"><i class="icon-shopping-cart"></i></a></span>
								<span><a href="product-detail.html"><i class="icon-eye"></i></a></span>


							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="shop.html">{{ $rows->name }}</a></h3>
						<p class="price"><span>{{ number_format($rows->price,0,'','.') }} VND</span> </p>
					</div>
				</div>
			</div>
			
			@endforeach
		</div>
	</div>
</div>

@stop
@section('index')
	active
@endsection