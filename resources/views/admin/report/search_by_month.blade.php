@extends('layouts.admin')
@section('content')

<div class="sl-mainpanel">


    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>This Month Report</h5>

      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title"> <span class="badge badge-success"><h5>  Total Amount This Month $ {{ $total }}</h5> </span>  </h6>

@if ($total > 0)
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Payment Type</th>
                <th class="wd-15p">Transction ID</th>
                <th class="wd-15p">SubTotal</th>
                <th class="wd-20p">Shipping</th>
                <th class="wd-20p">Total</th>
                <th class="wd-20p">Date</th>
                <th class="wd-20p">Status</th>
                <th class="wd-20p">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($orders as $row)
              <tr>
                <td>{{ $row->payment_type }}</td>
                <td>{{ $row->balance_transaction }}</td>
                <td>{{ $row->subtotal }} $</td>
                <td>{{ $row->shipping }} $</td>
                <td>{{ $row->total }} $</td>
                <td>{{ $row->date }}  </td>

                <td>
           @if($row->status == 0)
          <span class="badge badge-warning">Pending</span>
          @elseif($row->status == 1)
          <span class="badge badge-info">Payment Accept</span>
          @elseif($row->status == 2)
          <span class="badge badge-warning">Progress</span>
          @elseif($row->status == 3)
          <span class="badge badge-success">Delevered</span>
          @else
          <span class="badge badge-danger">Cancle</span>

           @endif

             </td>

                <td>
                    <a href="{{ route('admin.orders.view', $row->id)}}" class="btn btn-sm btn-info">View</a>

                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
        @else
        <p class="text-center text-info"><strong>No orders in this mont</strong></p>
        @endif
      </div><!-- card -->




  </div><!-- sl-mainpanel -->
@endsection
