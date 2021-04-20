@extends('layouts.admin')
@section('content')
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
      <a class="breadcrumb-item" href="">Brands</a>
      <span class="breadcrumb-item active">List</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Brands Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brands List
          <a href="" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Brand Id</th>
                <th class="wd-15p">Brand Name</th>
                <th class="wd-15p">Brand Logo</th>
                <th class="wd-20p">Actions</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($brands as $Brand)
              <tr>
                <td>{{ $Brand->id }}</td>
                <td>{{ $Brand->name }}</td>
                <td>
                    <img src="{{ asset('storage/'.$Brand->logo) }}" style="height: 100px ;, width:100px;" alt="logo">
                </td>

                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('admin.brands.edit', $Brand->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.brands.delete', $Brand->id) }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->


    <!-- model for Adding new category -->
      <!-- LARGE MODAL -->
      <form action="{{ route('admin.brands.store') }}" class="prevent-multiple-submits" method="POST" enctype="multipart/form-data">
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
                  <div class="form-group">
                  <label for="name">Brand Name</label>
                 <input type="text" class="form-control" name="name" id="">
                @error('name')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                   </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="logo">Brand Logo</label>
               <input type="file" class="form-control" name="logo" id="">
              @error('logo')
              <div class="alert alert-danger" role="alert">
                {{$message}}
                 </div>
              @enderror
          </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20 button-prevent-multiple-submits">
                    <i class="spinner fa fa-spinner fa-spin"></i>
                  Save</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
      </form>
@endsection
