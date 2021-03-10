@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Categories</a>
        <span class="breadcrumb-item active">List</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Categories Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Seo
            <a href="" class="btn btn-sm btn-success" style="float: right;" id="clear" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Seo Id</th>
                  <th class="wd-15p">Meta title</th>
                  <th class="wd-20p">Meta author</th>
                  <th class="wd-20p">Meta tag</th>
                  <th class="wd-20p">Meta description</th>
                  <th class="wd-20p">Google Analytics</th>
                  <th class="wd-20p">Bing Analytics</th>
                  <th class="wd-20p">Actions</th>

                </tr>
              </thead>
              <tbody>
                @if (isset($seo))
                <tr>
                  <td>{{ $seo->id }}</td>
                  <td>{{ $seo->meta_title }}</td>
                  <td>{{ $seo->meta_author  }}</td>
                  <td>{{ $seo->meta_tag  }}</td>
                  <td>{{ $seo->meta_description }}</td>
                  <td>{{ $seo->google_analytics }}</td>
                  <td>{{ $seo->bing_analytics }}</td>

                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.seo.edit', $seo->id) }}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{ route('admin.seo.delete', $seo->id) }}">Delete</a>

                  </td>
                </tr>
                @endif

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


      <!-- model for Adding new category -->
        <!-- LARGE MODAL -->
        <form action="{{ route('admin.seo.store') }}" class="prevent-multiple-submits form" method="POST">
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
                    <label for="name">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" id=" ">
                  @error('meta_title')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Meta Author</label>
                  <input type="text" class="form-control" name="meta_author" id=" ">
                  @error('meta_author')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Meta Tag</label>
                  <input type="text" class="form-control" name="meta_tag" id=" ">
                  @error('meta_tag')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Meta Description</label>
                  <input type="text" class="form-control" name="meta_description" id=" ">
                  @error('meta_description')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Google Analytics</label>
                  <input type="text" class="form-control" name="google_analytics" id=" ">
                  @error('google_analytics')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Bing Analytics</label>
                  <input type="text" class="form-control" name="bing_analytics" id=" ">
                  @error('bing_analytics')
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
