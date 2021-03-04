@extends('layouts.front')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_responsive.css') }}">
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart</div>
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
                                </div>
                            </li>

                            @endforeach
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total with Taxs:</div>
                            <div class="order_total_amount">${{ Cart::total() }}</div>
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
