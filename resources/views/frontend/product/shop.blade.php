@extends('frontend.master.master')
@section('content')
@section('title','Cửa hàng')
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row row-pb-lg">


                    @foreach ($product as $item)
                    <div class="col-md-4 text-center">
                        <div class="product-entry">
                            <div class="product-img" style="background-image: url(/backend/img/{{$item->img}});">
                                <p class="tag"><span class="new">New</span></p>
                                <div class="cart">
                                    <p>
                                        <span class="addtocart"><a href="cart.html"><i
                                                    class="icon-shopping-cart"></i></a></span>
                                        <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="/product/detail/{{$item->id}}">{{$item->name}}</a></h3>
                                <p class="price"><span>{{number_format($item->price,0,'','.')}} VNĐ</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination">
                            {!!$product->links()!!}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        
                        <h2>Danh mục</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                
                                @foreach ($category as $cate)
											@if ($cate->parent==0)
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="headingOne">
														<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#menu{{$cate->id}}" aria-expanded="true" aria-controls="collapseOne">
																{{$cate->name}}
															</a>
														</h4>
													</div>
													<div id="menu{{$cate->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
														<div class="panel-body">
															<ul>
																@foreach ($category as $cate2)
																@if ($cate2->parent==$cate->id)
																<li><a href="/product/shop?category={{$cate2->id}}">{{$cate2->name}}</a></li>
																@endif
																@endforeach
																
																
															</ul>
														</div>
													</div>
												</div>
											
											@endif
										@endforeach

                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h2>Khoảng giá</h2>
                        <form method="get" class="colorlib-form-2">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Từ:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="start" id="people" class="form-control">
                                                <option value="100000">100.000 VNĐ</option>
                                                <option value="200000">200.000 VNĐ</option>
                                                <option value="300000">300.000 VNĐ</option>
                                                <option value="500000">500.000 VNĐ</option>
                                                <option value="1000000">1.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" i000000="people" class="form-control">
                                                <option value="200000">200.000 VNĐ</option>
                                                <option value="500000">500.000 VNĐ</option>
                                                <option value="1000000">1.000.000 VNĐ</option>
                                                <option value="2000000">2.000.000 VNĐ</option>
                                                <option value="5000000">5.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="width: 100%;border: none;height: 40px;">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="side">
                        <h2>Màu sắc</h2>
                        <div class="size-wrap">
                            <p class="size-desc">
                                <a href="#" class="attr">Đỏ</a>
                                <a href="#" class="attr">Xanh</a>
                                <a href="#" class="attr">Đen</a>
                                <a href="#" class="attr">Trắng</a>

                            </p>
                        </div>
                    </div>
                    <div class="side">
                        <h2>Kích thước</h2>
                        <div class="size-wrap">
                            <p class="size-desc">
                                <a href="#" class="attr">xs</a>
                                <a href="#" class="attr">s</a>
                                <a href="#" class="attr">m</a>
                                <a href="#" class="attr">l</a>
                                <a href="#" class="attr">xl</a>
                                <a href="#" class="attr">xxl</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop