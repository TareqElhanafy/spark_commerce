@extends('layouts.front')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_responsive.css') }}">
@php
$order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(10)->get();
@endphp

<div class="contact_form">
  <div class="container">
    <div class="row">
      <div class="col-8 card">
        <table class="table table-response">
          <thead>
            <tr>
              <th scope="col">Payment Type </th>
              <th scope="col">Payment ID </th>
              <th scope="col">Amount </th>
              <th scope="col">Date </th>
              <th scope="col">Status  </th>
              <th scope="col">Status Code </th>
              <th scope="col">Action </th>

            </tr>
          </thead>
          <tbody>
            @foreach($order as $row)
            <tr>
              <td scope="col">{{ $row->payment_type }} </td>
              <td scope="col">{{ $row->payment_id }} </td>
              <td scope="col">${{ $row->paying_amount }}  </td>
              <td scope="col">{{ $row->date }} </td>

               <td scope="col">
          @if($row->return_order == 0)
          <span class="badge badge-warning">No Request</span>
          @elseif($row->return_order == 1)
          <span class="badge badge-info">Pending</span>
            @elseif($row->return_order == 2)
            <span class="badge badge-warning">Successfull Returned</span>
          @endif

                </td>

              <td scope="col">{{ $row->status_code }}  </td>
              <td scope="col">
                @if($row->return_order == 0)
                <a class="btn btn-sm btn-danger" href="{{ route('return.order.make',$row->id) }}">
                    Return
                </a>
                @elseif($row->return_order == 1)
                <span class="badge badge-info">Pending</span>
                  @elseif($row->return_order == 2)
                  <span class="badge badge-warning">Successfull</span>
                @endif

               </td>
            </tr>
             @endforeach

          </tbody>

        </table>

      </div>

      <div class="col-4">
        <div class="card">
          <img src="{{ asset('front/images/kaziariyan.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;">
          <div class="card-body">
            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>

          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> <a href="">Change Password</a>  </li>
             <li class="list-group-item">Edit Profile</li>
              <li class="list-group-item"><a href="{{ route('front.return') }}"> Return Order</a> </li>
          </ul>

          <div class="card-body">
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>

          </div>

        </div>

      </div>

    </div>

  </div>


</div>
@endsection
