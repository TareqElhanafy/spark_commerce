@extends('layouts.front')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/shop_responsive.css') }}">
	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                                @foreach ($categories as $category)
								<li><a href="{{ route('front.category.products',$category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
                                @foreach ($brands as $brand)
                                <li class="brand"><a href="">{{ $brand->name }}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">

					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{ $products->count() }}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>

                           @foreach ($products as $product)

							<!-- Product Item -->
							<div class="product_item discount">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('storage/'.$product->image_one) }}" style="height: 100px; width:100px;" alt=""></div>
								<div class="product_content">
                                    @if (isset($product->discount))
                                    <div class="product_price discount">${{ $product->discount }}<span>${{ $product->price }}</span></div>
                                    @else
                                    <div class="product_price">${{ $product->price }}</div>
                                    @endif
									<div class="product_name"><div><a href="#" tabindex="0">{{ $product->name }}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
                                    @if (isset($product->discount))
                                    <li class="product_mark product_discount">-{{ round((($product->price - $product->discount)/$product->price)*100,0) }}%</li>
                                    @else
                                    <li class="product_mark product_discount" style="background-color: blue;">new</li>
                                    @endif
								</ul>
							</div>
                            @endforeach

						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
                        {{$products ->links()}}
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
