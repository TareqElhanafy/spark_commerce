@extends('layouts.admin')
@section('content')
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
      <a class="breadcrumb-item" href="">Sub-Categories</a>
      <span class="breadcrumb-item active">List</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Sub-Categories Table</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Categories List
          <a href="" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Sub-Category Id</th>
                <th class="wd-15p">Sub-Category Name</th>
                <th class="wd-15p">Category Name</th>
                <th class="wd-20p">Actions</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($subcategories as $subcategory)
              <tr>
                <td>{{ $subcategory->id }}</td>
                <td>{{ $subcategory->name }}</td>
                <td>{{ $subcategory->category->name }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('admin.subcategories.edit', $subcategory->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.subcategories.delete', $subcategory->id) }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->


    <!-- model for Adding new category -->
      <!-- LARGE MODAL -->
      <form action="{{ route('admin.subcategories.store') }}" class="prevent-multiple-submits" method="POST">
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
                  <label for="name">Sub-Category Name</label>
                 <input type="text" class="form-control" name="name" id=" ">
                @error('name')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                   </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Choose Category</label>
                <select name="category_id" id="" class="form-control">

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" class="form-control" >
                        {{ $category->name }}
                    </option>
                    @endforeach

                </select>

                @error('category_id')
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
