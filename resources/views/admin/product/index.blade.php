@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Products</a>
        <span class="breadcrumb-item active">List</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Products Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Products List
            <a href="" class="btn btn-sm btn-danger" style="float: right;" id="clear" data-toggle="modal" data-target="#modaldemo3">Delete ALL</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product Id</th>
                  <th class="wd-15p">Product name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Category name</th>
                  <th class="wd-15p">Quantity</th>
                  <th class="wd-15p">Price</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>
                      <img src="{{ asset('storage/'.$product->image_one) }}" style="height: 100px; width:100px;" alt="">
                  </td>
                  <td>{{ $product->category->name }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->price }}</td>
                  <td>
                      @if ($product->status == 1)
                      <span class="badge badge-success">{{ $product->getStatus() }}</span>
                      @else
                      <span class="badge badge-danger">{{ $product->getStatus() }}</span>
                      @endif
                      </td>

                  <td>
                      <a class="btn btn-sm btn-warning" href="{{ route('admin.products.edit', $product->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.products.delete', $product->id) }}">
                    <i class="fa fa-trash"></i>
                </a>
                @if ($product->status == 1)
                <a class="btn btn-sm btn-success" id=""  href="{{route('admin.products.status', $product->id) }}">
                    <i class="fa fa-thumbs-down"></i>
                </a>
                @else
                <a class="btn btn-sm btn-success" id="" href="{{route('admin.products.status', $product->id) }}">
                    <i class="fa fa-thumbs-up"></i>
                </a>
                @endif


                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
@endsection
