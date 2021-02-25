@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Brands</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Brand</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $brand->id }}">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Brand</h6>
                </div>
                <div class="modal-body pd-20">
                    <div class="form-group">
                    <label for="name">Brand Name</label>
                  <input type="text" class="form-control" name="name" id=" " value="{{ $brand->name }}">
                  @error('name')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="category_id">Brand Logo</label>
                    <div class="form-group">
                        <img src="{{ asset('storage/'.$brand->logo) }}" class="form-control" style="height: 100px;  width:100px;" alt="">
                    </div>
                   <input type="file" name="logo" id="" value="{{ $brand->logo }}" class="form-control">
                    @error('logo')
                <div class="alert alert-danger" role="alert">
                             {{$message}}
                 </div>
                  @enderror
              </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.brands') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
