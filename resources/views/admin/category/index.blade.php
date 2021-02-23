@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Categories Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Categories List
            <a href="" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Category Id</th>
                  <th class="wd-15p">Category name</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                      <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.categories.delete', $category->id) }}">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
        <!-- LARGE MODAL -->
        <form action="{{ route('admin.categories.store') }}" method="POST">
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
                    <label for="name">Category Name</label>
                  <input type="text" name="name" id=" ">
                  @error('name')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
        </form>
@endsection
