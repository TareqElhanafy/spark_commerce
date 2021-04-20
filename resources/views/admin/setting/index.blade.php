@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Settings</a>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Settings Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Settings information
            <a href="" class="btn btn-sm btn-success" style="float: right;" id="clear" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Vat</th>
                  <th class="wd-15p">Shipping Charge</th>
                  <th class="wd-15p">Shop Name</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-15p">Address</th>
                  <th class="wd-15p">logo</th>
                  <th class="wd-15p">Twitter</th>
                  <th class="wd-15p">Facebook</th>
                  <th class="wd-15p">Youtube</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>
                @isset($setting)
                    <tr>
                  <td>{{ $setting->vat }}</td>
                  <td>{{ $setting->shipping_charge }}</td>
                  <td>{{ $setting->shopname }}</td>
                  <td>{{ $setting->email }}</td>
                  <td>{{ $setting->phone }}</td>
                  <td>{{ $setting->address }}</td>
                  <td>
                      <img src="{{ asset('storage/'.$setting->logo) }}" style="height: 100px; width:100px;" alt="">
                  </td>
                  <td>{{ $setting->twitter }}</td>
                  <td>{{ $setting->facebook }}</td>
                  <td>{{ $setting->youtube }}</td>
                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.settings.edit', $setting->id) }}">Edit</a>
                      <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.settings.delete', $setting->id) }}">Delete</a>
                  </td>
                 </tr>
                @endisset
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


      <!-- model for Adding new category -->
        <!-- LARGE MODAL -->
        <form action="{{ route('admin.settings.store') }}" class="prevent-multiple-submits form" method="POST" enctype="multipart/form-data">
            @csrf
         <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-20">
                    <label for="name">Vat</label>
                    <input type="number" class="form-control" name="vat" id=" ">
                    @error('vat')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Shipping Charge</label>
                    <input type="number" class="form-control" name="shipping_charge" id=" ">
                    @error('shipping_charge')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Shop Name</label>
                  <input type="text" class="form-control" name="shopname" id=" ">
                  @error('shopname')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Shop Email</label>
                  <input type="email" class="form-control" name="email" id=" ">
                  @error('email')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Shop Phone</label>
                  <input type="text" class="form-control" name="phone" id=" ">
                  @error('phone')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Shop Address</label>
                  <input type="text" class="form-control" name="address" id=" ">
                  @error('address')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Twitter</label>
                  <input type="text" class="form-control" name="twitter" id=" ">
                  @error('twitter')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Facebook</label>
                  <input type="text" class="form-control" name="facebook" id=" ">
                  @error('facebook')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Youtube</label>
                  <input type="text" class="form-control" name="youtube" id=" ">
                  @error('youtube')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Logo</label>
                  <input type="file" class="form-control" name="logo" id=" ">
                  @error('logo')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20 button-prevent-multiple-submits">
                      <i class="spinner fa fa-spinner fa-spin"></i>
                    Save</button>
                  <button type="button" class="btn btn-secondary pd-x-20" id="close" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
        </form>
@endsection
