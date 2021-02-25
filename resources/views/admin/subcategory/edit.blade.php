@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">sub-categories</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Sub-Category</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.subcategories.update',$subCategory->id) }}" method="POST">
            @csrf
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Sub-Category</h6>
                </div>
                <div class="modal-body pd-20">
                    <div class="form-group">
                    <label for="name">Sub-Category Name</label>
                  <input type="text" class="form-control" name="name" id=" " value="{{ $subCategory->name }}">
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
                        <option value="{{ $category->id }}" class="form-control" @if($subCategory->category->id == $category->id) selected @endif>
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
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.subcategories') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
