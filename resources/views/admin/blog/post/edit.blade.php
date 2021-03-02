@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Posts</a>
      <span class="breadcrumb-item active">Add posts</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Edit Posts</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit post</h6>
        <form action="{{ route('admin.blog.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Post Title in (EN): <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="title_en"  value="{{ $post->title_en }}" placeholder="Enter post title">
                @error('title_en')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                   </div>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Title in (AR): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title_ar"  value="{{ $post->title_ar }}" placeholder="أدخل عنوان المنشور">
                  @error('title_ar')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="category_id" data-placeholder="Choose category">
                    <option label="Choose category">Choose category</option>
                    @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if ($category->id == $post->category->id)
                      selected
                  @endif>
                  {{ $category->category_name_en }}
                </option>
                  @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                   </div>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group" >
                  <label class="form-control-label">Details in (EN): <span class="tx-danger">*</span></label>
                  <textarea name="details_en" class="form-control"id="summernote"  cols="30" rows="10">{{ $post->details_en }}</textarea>
               @error('details_en')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group" >
                  <label class="form-control-label">Details in (AR): <span class="tx-danger">*</span></label>
                  <textarea name="details_ar" class="form-control"id="summernote1"  cols="30" rows="10">{{ $post->details_ar }}</textarea>
               @error('details_en')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image: </label>
                  <label class="custom-file">
                    <input type="file" id="file" name="image" class="custom-file-input form-control" onchange="readURL(this);">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    @error('image')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <span class="custom-file-control"></span>
                    <br>
                    <img src="{{ asset('storage/'.$post->image) }}" style="height: 80px; width:80px;" id="one" alt="">
                    <br>
                  </label>
                </div>
              </div><!-- col-4 -->
          </div><!-- row -->
          <br><br><br> <br>
          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
            <button class="btn btn-secondary">Cancel</button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </form>
      </div><!-- card -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script><!--mutltiple tagsinput -->
<!--displaying images -->

<script type="text/javascript">
    function readURL(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#one')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection

