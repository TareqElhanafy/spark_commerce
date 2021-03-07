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
                            @foreach ($wishlistItems as $row)

                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{ asset('storage/'.$row->product->image_one) }}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{ $row->name }}</div>
                                    </div>
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text"><span style="background-color:black;"></span>{{ $row->color }}</div>
                                    </div>

                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">${{ $row->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Actions</div>
                                        <div class="cart_item_text"><a href="{{ route('front.product.add',$row->product->id) }}" class="btn btn-sm btn-success">Add To Cart</a></div>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
