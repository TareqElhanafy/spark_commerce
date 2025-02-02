@extends('layouts.admin')
@section('content')

<div class="sl-mainpanel">
    <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Order Details  </h6>


<div class="row">
    <div class="col-md-6">
          <div class="card">
              <div class="card-header"><strong>Order</strong> Details</div>
       <div class="card-body">
           <table class="table">
               <tr>
           <th> Name: </th>
           <th> {{ $order->name }} </th>
               </tr>

               <tr>
           <th> Phone: </th>
           <th> {{ $order->email }} </th>
               </tr>



               <tr>
           <th> Payment Type: </th>
           <th>{{ $order->payment_type }} </th>
               </tr>



               <tr>
           <th> Payment Id: </th>
           <th> {{ $order->payment_id }} </th>
               </tr>


               <tr>
           <th> Total : </th>
           <th> {{ $order->total }} $ </th>
               </tr>

               <tr>
           <th> Month: </th>
           <th> {{ $order->month }} </th>
               </tr>

                   <tr>
           <th> Date: </th>
           <th> {{ $order->date }} </th>
               </tr>

           </table>


       </div>



       </div>
  </div>



  <div class="col-md-6">
          <div class="card">
              <div class="card-header"><strong>Shipping</strong> Details</div>
       <div class="card-body">
           <table class="table">
               <tr>
           <th> Name: </th>
           <th> {{ $shipping->ship_name }} </th>
               </tr>

               <tr>
           <th> Phone: </th>
           <th> {{ $shipping->ship_phone }} </th>
               </tr>



               <tr>
           <th> Email: </th>
           <th>{{ $shipping->ship_email }} </th>
               </tr>



               <tr>
           <th> Address: </th>
           <th> {{ $shipping->ship_address }} </th>
               </tr>


               <tr>
           <th> City : </th>
           <th> {{ $shipping->ship_city }} </th>
               </tr>

               <tr>
           <th> Status: </th>
           <th>
           @if($order->status == 0)
           <span class="badge badge-warning">Pending</span>
           @elseif($order->status == 1)
           <span class="badge badge-info">Payment Accepted</span>
          @elseif($order->status == 2)
          <span class="badge badge-warning">Delievery in Progress</span>
          @elseif($order->status == 3)
          <span class="badge badge-success">Delevered</span>
          @else
          <span class="badge badge-danger">Cancled</span>

           @endif

            </th>

               </tr>


           </table>
       </div>

       </div>
  </div>



</div>


<div class="row">

<div class="card pd-20 pd-sm-40 col-lg-12">
        <h6 class="card-body-title">Product Details

        </h6>


        <div class="table-wrapper">
          <table class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Product ID</th>
                <th class="wd-15p">Product Name</th>
                <th class="wd-15p">Image</th>
                <th class="wd-15p">Color</th>
                <th class="wd-15p">Size</th>
                <th class="wd-15p">Quantity</th>
                <th class="wd-15p">Unit Price</th>
                <th class="wd-20p">Total</th>

              </tr>
            </thead>
            <tbody>
              @foreach($details as $row)
              <tr>
                <td>{{ $row->product_id }}</td>
                <td>{{ $row->product_name }}</td>

           <td> <img src="{{asset('storage/'.$row->image_one)}}" height="50px;" width="50px;"> </td>
               <td>{{ $row->color }}</td>
               <td>{{ $row->size }}</td>
               <td>{{ $row->quantity }}</td>
               <td>{{ $row->single_price }}</td>
               <td>{{ $row->total_price }}</td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->


</div>


@if($order->status == 0)
<a href="{{ route('admin.orders.paymentaccept',$order->id) }}" class="btn btn-info">Payment Accept </a>
<a href="{{ route('admin.orders.cancel',$order->id) }}" class="btn btn-danger">Order Cancel </a>
@elseif($order->status == 1)
<a href="{{ route('admin.orders.startdelievery', $order->id) }}" class="btn btn-info"> Start Process Delievery </a>
@elseif($order->status == 2)
<a href="{{ route('admin.orders.delieverydone', $order->id) }}" class="btn btn-success">Delievery Done </a>
@elseif($order->status == 3)
<strong class="text-success text-center">This product is successfuly Delieverd  </strong>
@else
<strong class="text-danger text-center"> This order is not valid  </strong>
@endif



   </div>
 </div>
</div>
@endsection


