@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">coupons</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Coupon</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.coupons.update',$coupon->id) }}" method="POST">
            @csrf
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Category</h6>
                </div>
                <div class="modal-body pd-20">
                    <label for="name">Coupon Code</label>
                  <input type="text" name="code" class="form-control" id=" " value="{{ $coupon->code }}">
                  @error('code')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Coupon Code</label>
                  <input type="text" class="form-control" name="discount" id=" " value="{{ $coupon->discount }}">
                  @error('discount')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.coupons') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
