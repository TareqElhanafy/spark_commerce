@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Orders</a>
        <span class="breadcrumb-item active">List</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5> return orders requests Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">return orders requests List
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
                    @if($order->return_order == 0)
                    <span class="badge badge-warning">No Request</span>
                    @elseif($order->return_order == 1)
                    <span class="badge badge-info">Pending</span>
                      @elseif($order->return_order == 2)
                      <span class="badge badge-warning">Successfull Returned</span>
                    @endif
                </td>

                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.return.approve', $order->id) }}">Approve</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
@endsection

