@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Seos</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Category</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.seo.update',$seo->id) }}" method="POST">
            @csrf
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Category</h6>
                </div>
                <div class="modal-body pd-20">
                    <label for="name">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" id=" " value="{{ $seo->meta_title }}">
                    @error('meta_title')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Meta Author</label>
                    <input type="text" class="form-control" name="meta_author" id=" " value="{{ $seo->meta_author }}">
                    @error('meta_author')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Meta Tag</label>
                    <input type="text" class="form-control" name="meta_tag" id=" " value="{{ $seo->meta_tag }}">
                    @error('meta_tag')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description" id=" " value="{{ $seo->meta_description }}">
                    @error('meta_description')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Google Analytics</label>
                    <input type="text" class="form-control" name="google_analytics" id=" " value="{{ $seo->google_analytics }}">
                    @error('google_analytics')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">Bing Analytics</label>
                    <input type="text" class="form-control" name="bing_analytics" id=" " value="{{ $seo->bing_analytics }}">
                    @error('bing_analytics')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.seo') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
