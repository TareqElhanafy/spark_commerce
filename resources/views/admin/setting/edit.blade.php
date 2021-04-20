@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="">Setting</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Settings</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.settings.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Category</h6>
                </div>
                <div class="modal-body pd-20">
                    <label for="name">Vat</label>
                    <input type="number" class="form-control" name="vat" id=" " value="{{ $setting->vat }}">
                    @error('vat')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Shipping Charge</label>
                    <input type="number" class="form-control" name="shipping_charge" id=" " value="{{ $setting->shipping_charge }}">
                    @error('shipping_charge')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Shop Name</label>
                  <input type="text" class="form-control" name="shopname" value="{{ $setting->shopname }}" id=" ">
                  @error('shopname')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Shop Email</label>
                  <input type="email" class="form-control" name="email" value="{{ $setting->email }}" id=" ">
                  @error('email')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Shop Phone</label>
                  <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}" id=" ">
                  @error('phone')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Shop Address</label>
                  <input type="text" class="form-control" name="address" value="{{ $setting->address }}" id=" ">
                  @error('address')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Twitter</label>
                  <input type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}" id=" ">
                  @error('twitter')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Facebook</label>
                  <input type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}" id=" ">
                  @error('facebook')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Youtube</label>
                  <input type="text" class="form-control" name="youtube" value="{{ $setting->youtube }}" id=" ">
                  @error('youtube')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Logo</label>
                  <img src="{{ asset('storage/'.$setting->logo) }}" style="height: 100px; width:100px;" alt="">
                  <input type="file" class="form-control" name="logo"  id=" ">
                  <input type="hidden" name="id" id="" value="{{ $setting->id }}">
                  @error('logo')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.settings') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
