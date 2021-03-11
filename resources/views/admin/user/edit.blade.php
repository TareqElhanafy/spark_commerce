@extends('layouts.admin')

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Starlight</a>
          <a class="breadcrumb-item" href="index.html">Users</a>
          <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Edit Category</h5>
          </div><!-- sl-page-title -->
          <form action="{{ route('admin.users.update',$user->id) }}" method="POST">
            @csrf
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">edit Category</h6>
                </div>
                <div class="modal-body pd-20">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" id="" value="{{ $user->name }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">User Email</label>
                    <input type="email" class="form-control" name="email" id=" " value="{{ $user->email }}">
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">User Password</label>
                    <input type="password" class="form-control" name="password" id=" ">
                    <input type="hidden" name="id" id="" value="{{ $user->id }}">
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                    <label for="name">User Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id=" ">
                    <input type="hidden" name="id" id="" value="{{ $user->id }}">
                    @error('password_confirmation')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                       </div>
                    @enderror
                </div><!-- modal-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info pd-x-20">Save</button>
                  <a  class="btn btn-secondary pd-x-20" href="{{ route('admin.users') }}">Close</a>
                </div>
              </div>
        </form>

        <!-- model for Adding new category -->
          <!-- LARGE MODAL -->
        </div>
@endsection
