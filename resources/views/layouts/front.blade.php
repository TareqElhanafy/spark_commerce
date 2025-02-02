
<!DOCTYPE html>
<html lang="en">
<head>

<title>SparK</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('front/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/responsive.css') }}">
            <!-- toastr -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->
        @php
          $setting = DB::table('settings')->first();
        @endphp
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('front/images/phone.png') }}" alt=""></div>{{ $setting->phone }}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('front/images/mail.png') }}" alt=""></div><a href="{{ $setting->email }}">{{ $setting->email }}</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
                                    @php
                                        $lang = Session::get('lang');
                                    @endphp
                                    @if($lang === 'English')
									<li>
										<a href="{{ route('languages.ar') }}">Arabic<i class="fas fa-chevron-down"></i></a>
									</li>
                                    @else
                                    <li>
										<a href="{{ route('languages.en') }}">English<i class="fas fa-chevron-down"></i></a>
									</li>
                                    @endif
								</ul>
							</div>
                            @guest
                            <div class="top_bar_user">
								<div class="user_icon"><img src="{{ asset('front/images/user.svg') }}" alt=""></div>
								<div><a href="{{ route('login') }}">Register</a></div>
								<div><a href="{{ route('login') }}">Sign in</a></div>
							</div>
                            @else
                            <div class="top_bar_user">
								<div><a data-toggle="modal" data-target="#exampleModal" href="">Track My order</a></div>
							</div>
                            <div class="top_bar_user">
								<div class="user_icon"><img src="{{ asset('front/images/user.svg') }}" alt=""></div>
								<div><a href="{{ route('user.logout') }}">Logout</a></div>
							</div>

                            @endguest

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{ route('frontpage') }}">SparK</a></div>
						</div>
					</div>
                 @php
                    $categories = App\Category::get();
                @endphp
					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{ route('search') }}" class="header_search_form clearfix" method="POST">
                                        @csrf
										<input type="search" required="required" name="search" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">

                                                    @foreach ($categories  as $category)
													<li><a class="clc" href="{{ route('frontpage') }}">{{ $category->name }}</a></li>
                                                    @endforeach
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('front/images/search.png') }}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">

                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            @guest

                            @else
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="{{ asset('front/images/heart.png') }}" alt=""></div>
                                <div class="wishlist_content">
                                    @php
                                        $items = App\Wishlist::get();
                                    @endphp
                                    <div class="wishlist_text"><a href="{{ route('wishlist') }}">Wishlist</a></div>
                                    <div class="wishlist_count">{{ $items->count() }}</div>
                                </div>
                            </div>
                        @endguest

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{ asset('front/images/cart.png') }}" alt="">
										<div class="cart_count"><span>{{ Cart::count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('cart') }}">Cart</a></div>
										<div class="cart_price">${{ Cart::subtotal() }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
                                    @foreach ($categories as $category)
                                    @if(isset($category->subcategories))
                                    <li class="hassubs">
										<a href="{{ route('front.category.products',$category->id) }}">{{ $category->name }}<i class="fas fa-chevron-right"></i></a>
										<ul>
                                            @foreach ($category->subcategories as $subcategory)
											<li><a href="{{ route('front.subcategory.products',$subcategory->id) }}">{{ $subcategory->name }}<i class="fas fa-chevron-right"></i></a></li>
                                            @endforeach
										</ul>
									</li>
                                    @else
									<li><a href="{{ route('front.category.products',$category->id) }}">{{ $category->name }} <i class="fas fa-chevron-right ml-auto"></i></a></li>
                                    @endif
                                    @endforeach

								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="{{ route('home') }}">Home<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{ route('blog') }}">Blog<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{ route('contact') }}">Contact<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>

		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="page_menu_content">

							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item has-children">
									<a href="#">Language<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item">
									<a href="#">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
										<li class="page_menu_item has-children">
											<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
											<ul class="page_menu_selection">
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											</ul>
										</li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>

							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('front/images/phone_white.png') }}" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('front/images/mail_white.png') }}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>


                 @yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="">SparK</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">{{ $setting->phone }}</div>
						<div class="footer_contact_text">
							<p>{{ $setting->address }}</p>

						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

                @php
                    $firstFiveCats = App\Category::limit(5)->get();
                    $secondFiveCats = App\Category::get()->skip(5);
                @endphp

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
                            @foreach ($firstFiveCats as $cat)
							<li><a href="{{ route('front.category.products', $cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
                            @foreach ($secondFiveCats as $cat)
							<li><a href="{{ route('front.category.products', $cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('track.order') }}" method="POST">
                @csrf
            <input type="text" class="form-control" name="status_code" id="" required>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('front/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('front/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('front/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('front/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
<script src="{{ asset('front/js/product_custom.js') }}"></script>
<script src="{{ asset('front/js/cart_custom.js') }}"></script>
<script src="{{ asset('front/js/blog_custom.js') }}"></script>
<script src="{{ asset('front/js/blog_single_custom.js') }}"></script>
<script src="{{ asset('front/js/shop_custom.js') }}"></script>
@yield('scripts')
   <!-- toastr -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <!--  toaster -->
 <!--  toaster -->
 <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}")
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}")
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
            case 'warning':
            toastr.info("{{ Session::get('message') }}")
            break;
        default:
            break;
    }
    @endif
</script>

<!--Add to Wishlist -->

<script>
    $(document).ready(function(){
     $('.addtiwishlist').on('click', function(){
       var id = $(this).data('id')
       if (id) {
           $.ajax({
               url:"{{ url('wishlist/add-to-wishlist/')}}/"+id,
               type:"GET",
               dataType:"json",
               success:function(data){
    var type = data.alert
    switch (type) {
        case 'info':
            toastr.info(data.message)
            break;
            case 'success':
            console.log(data.message)
            toastr.success(data.message)
            break;
            case 'error':
            toastr.error(data.message)
            break;
            case 'warning':
            toastr.info(data.message)
            break;
        default:
            break;
    }

               }
           });
       }
     });
    });
</script>


<!--Add to Cart from front page -->
<script>
    $(document).ready(function(){
     $('.product_cart_button').on('click', function(){
       var id = $(this).data('id')
       if (id) {
           $.ajax({
               url:"{{ url('cart/add-to-cart/')}}/"+id,
               type:"GET",
               dataType:"json",
               success:function(data){
    var type = data.alert
    switch (type) {
        case 'info':
            toastr.info(data.message)
            break;
            case 'success':
            console.log(data.message)
            toastr.success(data.message)
            break;
            case 'error':
            toastr.error(data.message)
            break;
            case 'warning':
            toastr.info(data.message)
            break;
        default:
            break;
    }
               }
           });
       }
     });
    });
</script>
<!--clearing the modal from cached data -->
<script>
    $(".modal").on("hidden.bs.modal", function(){
        $(".modal-body input").val("");
        });
    </script>
</body>

</html>
