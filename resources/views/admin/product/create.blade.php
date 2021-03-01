@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Products</a>
      <span class="breadcrumb-item active">Add Products</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Add Products</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add New Product</h6>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Prodct Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="name"  value="" placeholder="Enter product name">
                @error('name')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                   </div>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                <input class="form-control" type="number" name="quantity" value="" placeholder="Enter quantity">
                @error('quantity')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                   </div>
                @enderror
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                <input class="form-control" type="number" name="price" value="" placeholder="Enter price">
                @error('price')
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
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub-Category: </label>
                  <select class="form-control select2" name="subcategory_id" data-placeholder="Choose sub-category">
                  </select>
                  @error('subcategory_id')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brands:</label>
                  <select class="form-control select2" data-placeholder="Choose brand">
                      <option label="Choose brand">Choose brand</option>
                      @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                  @error('brand_id')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group" >
                  <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                  <textarea name="description" class="form-control"id="summernote"  cols="30" rows="10"></textarea>
               @error('description')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Sizes: </label>
                  <input class="form-control" type="text" name="size" value="" data-role="tagsinput" placeholder="Enter any size">
                  @error('size')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">colors:</label>
                  <input class="form-control" type="text" name="color" value="" data-role="tagsinput" placeholder="Enter any color">
                  @error('color')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">discount: </label>
                  <input class="form-control" type="number" name="discount" value=""  placeholder="Enter discount">
                  @error('discount')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">video Link: </label>
                  <input class="form-control" type="text" name="video_link" value=""  placeholder="Enter video link">
                  @error('video_link')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image One: </label>
                  <label class="custom-file">
                    <input type="file" id="file" name="image_one" class="custom-file-input form-control" onchange="readURL(this);">
                    @error('image_one')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <span class="custom-file-control"></span>
                    <br>
                    <img src="" id="one" alt="">
                    <br>
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: </label>
                  <label class="custom-file">
                    <input type="file" id="file" name="image_two" class="custom-file-input form-control" onchange="readURL2(this);">
                    <span class="custom-file-control"></span>
                    @error('image_two')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <br>
                    <img src="" id="two" alt="">
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: </label>
                  <label class="custom-file">
                    <input type="file" id="file" name="image_three" class="custom-file-input form-control" onchange="readURL3(this);">
                    <span class="custom-file-control"></span>
                    @error('image_three')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <br>
                    <img src="" id="three" alt="">
                  </label>
                </div>
              </div><!-- col-4 -->
          </div><!-- row -->
          <br><br><br> <br>

          <div class="row">
            <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="status" value="1">
                    <span>Status</span>
                  </label>
                  @error('status')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
              </div><!-- col-4 -->
            <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1">
                    <span>Main Slider</span>
                  </label>
                  @error('main_slider')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1">
                    <span>Hot deal</span>
                  </label>
                  @error('hot_deal')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="mid_slider" value="1">
                    <span>Mid Slider</span>
                  </label>
                  @error('mid_slider')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="best_rated" value="1">
                    <span>Best Rated</span>
                  </label>
                  @error('best_rated')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="trend" value="1">
                    <span>Trend</span>
                  </label>
                  @error('trend')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                     </div>
                  @enderror
              </div><!-- col-4 -->
          </div>
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


<!--Loading subcategories with ajax -->
<script type="text/javascript">
    $(document).ready(function(){
   $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {

          $.ajax({
            url: "{{ url('/admin/sub-categories/get/subcategory/') }}/"+category_id,
            type:"GET",
            dataType:"json",
            success:function(data) {
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){

            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');

            });
            },
          });

        }else{
          alert('danger');
        }

          });
    });

</script>
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
  <script type="text/javascript">
    function readURL2(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#two')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script type="text/javascript">
    function readURL3(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#three')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection

