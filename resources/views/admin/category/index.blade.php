@extends('admin.layouts.app')

@section('content')
<!-- alert delete successful -->
    @if(Session::has('deleteSuccess'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ Session::get('deleteSuccess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif()
<!-- end delete successful -->
<div class="row mt-4">
<div class="col-4">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin#createCategory') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Enter category name">
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30" rows="10" name="category_description" class="form-control" placeholder="Enter Description"></textarea>
                    @error('category_description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<div class="col-8">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category List Page</h3>

            <div class="card-tools">
               <form action="{{ route('admin#searchCategory') }}" method="post">
                @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="category_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
               </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Customer Name</th>
                        <th>Category Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($category as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>
                                <a href="{{route('admin#categoryEditPage', $item['id'])}}">
                                    <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                </a>

                                <a href="{{ route('admin#deleteCategory', $item['id']) }}">
                                    <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
