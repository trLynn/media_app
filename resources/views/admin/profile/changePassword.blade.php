@extends('admin.layouts.app')

@section('content')

<div class="col-md-9 offset-1 mt-2">
    <div class="card">
        <div class="card-header p-2">
            <legend class="text-center">Change Password</legend>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    @if(Session::has('updateSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('updateSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form class="form-horizontal" method="post" action="{{ route('admin#changePassword') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="oldPassword" class="form-control" id="inputName" placeholder="Old Password">
                                @error('oldPassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="newPassword" class="form-control" id="inputEmail" placeholder="New Password">
                                @error('newPassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="confirmPassword" class="form-control" id="inputName" placeholder="Confirm Password">
                                @error('confirmPassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn bg-dark text-white">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
