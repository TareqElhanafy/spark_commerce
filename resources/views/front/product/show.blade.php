@extends('layouts.front')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/product_responsive.css') }}">
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ asset('storage/'.$product->image_one) }}"><img src="{{ asset('storage/'.$product->image_one) }}" alt=""></li>
						<li data-image="{{ asset('storage/'.$product->image_two) }}"><img src="{{ asset('storage/'.$product->image_two) }}" alt=""></li>
						<li data-image="{{ asset('storage/'.$product->image_three) }}"><img src="{{ asset('storage/'.$product->image_three) }}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('storage/'.$product->image_one) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">
                            @if (isset($product->subcategory))
                            {{ $product->Category->name }}-{{ $product->subCategory->name }}
                            @else
                            {{ $product->Category->name }}
                            @endif
                        </div>
						<div class="product_name">{{ $product->name }}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>
                            {!! str_limit($product->description, $limit = 600)  !!}
                            </p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{ route('front.product.add',$product->id) }}" method="POST">
                                    @csrf
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" value="1" placeholder="Quantity">
                                    <br>
                                  <div class="row">
                                        <div class="col 6">
                                            <label for="color">Choose Color</label>
                                            <br>
                                            <select name="color" class="custom-select">
                                                @foreach ($colors as $color)
                                                <option name="color" value="{{ $color }}">{{ $color }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="col 6">
                                            <label for="size">Choose Size</label>
                                            <br>
                                            <select name="size" class="custom-select">
                                              @foreach ($sizes as $size)
                                              <option name="size" value="{{ $size }}">{{ $size }}</option>
                                              @endforeach
                                            </select>
                                        </div>

                                  </div>
                                @if (isset($product->discount))
                                <div class="banner_price"><span>${{ $product->price }}</span>${{ $product->discount }}</div>
                                @else
                                <div class="product_price">${{ $product->price }}</div>
                                @endif
								<div class="button_container">
									<button type="submit" class="button cart_button" >Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Description</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Product Video</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
                        </li>
                      </ul>
                      <br><br><br>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{!! $product->description  !!}</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">{{ $product->video_link }}</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                      </div>

				</div>
			</div>
		</div>
	</div>

    @endsection
