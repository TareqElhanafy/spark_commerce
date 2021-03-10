@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Orders</a>
        <span class="breadcrumb-item active">List</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5> Orders Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupons List
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Order Id</th>
                  <th class="wd-15p">Payment Type</th>
                  <th class="wd-15p">Transaction ID</th>
                  <th class="wd-20p">Subtotal</th>
                  <th class="wd-20p">Total</th>
                  <th class="wd-20p">Shipping</th>
                  <th class="wd-20p">Date</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Action</th>

                </tr>
              </thead>
              <tbody>

                  @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->payment_type }}</td>
                  <td>{{ $order->balance_transaction }}</td>
                  <td>{{ $order->subtotal }}</td>
                  <td>{{ $order->total }}</td>
                  <td>{{ $order->shipping }}</td>
                  <td>{{ $order->date }}</td>
                  <td>
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
                </td>

                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.orders.view', $order->id) }}">View</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
@endsection

