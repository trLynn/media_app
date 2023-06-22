@extends('admin.layouts.app')

@section('content')
<div class="col-8 offset-3 mt-2">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <legend class="text-center">User Profile</legend>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="post" action="{{ route('admin#update') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{ $userInfo->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $userInfo->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" id="inputName" placeholder="Phone" value="{{ $userInfo->phone }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" id="" cols="30" rows="10" class="form-control" placeholder="Address" {{ $userInfo->address }}></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10 mt-2">
                                    <select name="" id="">
                                        @if($userInfo->gender == 'male')
                                        <option value="empty">Choose Your Option</option>
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        @elseif($userInfo->gender == 'female')
                                        <option value="empty">Choose Your Option</option>
                                        <option value="male">Male</option>
                                        <option value="female" selected>Female</option>
                                        @else
                                        <option value="empty" selected>Choose Your Option</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn bg-dark text-white">Update</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <a href="">Change Password</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
