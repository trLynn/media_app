@extends('admin.layouts.app')

@section('tasks')

    <form action="">
        <div class="row">
            <div class="col-2 mt-2">Name</div>
            <div class="col-5">
                <input type="text" class="form-control mt-2" placeholder="Enter Name">
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-2">Email</div>
            <div class="col-5">
                <input type="text" class="form-control mt-2" placeholder="Enter Email">
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-2">Phone</div>
            <div class="col-5">
                <input type="text" class="form-control mt-2" placeholder="Enter Phone">
            </div>
        </div>
        <div class="row">
            <div class="col-2 mt-2">Adress</div>
            <div class="col-5">
                <textarea class="form-control mt-2" cols="30" rows="10" placeholder="Enter Address"></textarea>
            </div>
        </div>
        <div class="offset-2 mt-2">
            <button class="btn bg-dark text-white">Update</button>
        </div>
    </form>

    <a href="#" style="margin-left:350px;">change Password</a>

@endsection


