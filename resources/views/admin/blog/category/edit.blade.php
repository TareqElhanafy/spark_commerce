@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Blog Categories</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Blog Category</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.blog.categories.update',$category->id) }}" method="POST">
            @csrf
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Blog Category</h6>
                </div>
                <div class="modal-body pd-20">
                    <label for="name">Category Name in (EN)</label>
                  <input type="text" class="form-control" name="category_name_en" id=" " value="{{ $category->category_name_en }}">
                  @error('category_name_en')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                  <label for="name">Category Name in (AR)</label>
                  <input type="text" class="form-control" name="category_name_ar" id=" " value="{{ $category->category_name_ar }}">
                  @error('category_name_ar')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.blog.categories') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
