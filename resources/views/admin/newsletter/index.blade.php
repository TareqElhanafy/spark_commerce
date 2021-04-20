@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="">Subscribers</a>
        <span class="breadcrumb-item active">List</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Subscribers Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Subscribers List
            <a href="" class="btn btn-sm btn-success" style="float: right;" id="clear" data-toggle="modal" data-target="#modaldemo3">Delete All</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">Subscriber Id</th>
                  <th class="wd-15p">Subscriber Email</th>
                  <th class="wd-20p">Actions</th>
                </tr>
              </thead>
              <tbody>

                  @foreach ($Subscribers as $Subscriber)
                <tr>
                  <td> <input type="checkbox">   {{  $Subscriber->id  }}</td>
                  <td>{{ $Subscriber->email }}</td>
                  <td>
                      <a class="btn btn-sm btn-danger" id="delete" href="{{route('admin.newsletters.delete', $Subscriber->id) }}">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


@endsection

