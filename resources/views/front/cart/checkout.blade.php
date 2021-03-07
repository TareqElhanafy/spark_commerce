@extends('layouts.front')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_responsive.css') }}">
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Checkout</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach ($content as $row)

                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{ asset('storage/'.$row->options['image']) }}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $row->name }}</div>
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text"><span style="background-color:black;"></span>{{ $row->color }}</div>
                                    </div>
                                    <form action="{{ route('cart.update',$row->rowId) }}" method="POST">
                                        @csrf
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">
                                            <input name="qty" type="number" value="{{ $row->qty }}">
                                            <button type="submit" class="btn btn-sm btn-success">change</button>
                                        </div>
                                    </div>
                                </form>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">${{ $row->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">${{ $row->subtotal() }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Actions</div>
                                        <div class="cart_item_text"><a href="{{ route('cart.delete',$row->rowId) }}" class="btn btn-sm btn-danger">Delete Item</a></div>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                    <!-- Order Total -->
                    <br>
                    <div class="order_total_content" style="padding: 15px;">

                        <h5 style="margin-left: 20px;"> Apply Coupon </h5>
                            <form method="post" action="">
                                @csrf
                                <div class="form group col-lg-4">
                                    <input type="text" name="coupon" class="form-control" required="" placeholder="Enter Your Coupon">
                                </div><br>
                       <button type="submit" class="btn btn-danger ml-2">Submit
                       </button>
                            </form>

                        </div>
                        <ul class="list-group col-lg-4" style="float: right;">
                           <li class="list-group-item">Subtotal : <span style="float: right;">
                           </span> </li>
                            <li class="list-group-item">Coupon : ()
                           <a href="" class="btn btn-danger btn-sm">X</a>
                        <span style="float: right;"></span> </li>
                           <li class="list-group-item">Subtotal : <span style="float: right;">
                            </span> </li>




                           <li class="list-group-item">Shiping Charge : <span style="float: right;"> </span> </li>
                           <li class="list-group-item">Vat : <span style="float: right;"> </span> </li>

                           <li class="list-group-item">Total : <span style="float: right;"> </span> </li>
                    <li class="list-group-item">Total : <span style="float: right;"></span> </li>

                       </ul>
                    </div>
                </div>
                    </div>
                    <div class="cart_buttons">
                        <a type="button" class="button cart_button_clear">Clear Your Cart</a>
                        <a type="button" class="button cart_button_checkout">CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

