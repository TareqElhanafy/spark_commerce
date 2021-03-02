@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Posts</a>
        <span class="breadcrumb-item active">List</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Posts Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Posts List
            <a href="" class="btn btn-sm btn-danger" style="float: right;" id="clear" data-toggle="modal" data-target="#modaldemo3">Delete ALL</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Post Id</th>
                  <th class="wd-15p">Post title in (EN)</th>
                  <th class="wd-15p">Post tile in (ar)</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Category name</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title_en }}</td>
                  <td>{{ $post->title_ar }}</td>
                  <td>
                      <img src="{{ asset('storage/'.$post->image) }}" style="height: 100px; width:100px;" alt="">
                  </td>
                  <td>{{ $post->category->category_name_en }}</td>
                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.blog.posts.edit', $post->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.blog.posts.delete', $post->id) }}">
                    <i class="fa fa-trash"></i>
                </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
@endsection
