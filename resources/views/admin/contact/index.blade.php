@extends('layouts.admin')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Messages</a>
          <span class="breadcrumb-item active">List</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Messages Table</h5>
          </div><!-- sl-page-title -->

          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Messages List
              <a href="" class="btn btn-sm btn-success" style="float: right;" id="clear">Delete All</a>
            </h6>
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-5p">Message Id</th>
                    <th class="wd-15p">contact Name</th>
                    <th class="wd-15p">contact Email</th>
                    <th class="wd-15p">contact Phone</th>
                    <th class="wd-15p">contact Message</th>

                    <th class="wd-20p">Actions</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($messages as $message)
                  <tr>
                    <td>  {{$message->id  }}</td>
                    <td>{{ $message->name }}</td>

                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{!!str_limit($message->message, $limit=200)!!}</td>
                    <td>
                        <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modaldemo3">view full message</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->


      <!-- model for Adding new category -->
        <!-- LARGE MODAL -->

         <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Contact Message</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-20">
                    <p>{{ $message->message }}</p>
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary pd-x-20" id="close" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
@endsection
