@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin List Page</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width:150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class=""></i>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
