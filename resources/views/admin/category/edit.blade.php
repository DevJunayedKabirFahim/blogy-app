@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>

                <p class="text-success text-center">{{session('message')}}</p>
                <div class="card-body">
                    <form action="{{route('category.update', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-2">Category Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Write category name" required/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-2">Category Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control" placeholder="Write category description" required>{{$category->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-2">Category Image</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" class="form-control-file"/>
                                <img src="{{asset($category->image)}}" alt="" height="100" width="120"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-2">Publication Status</label>
                            <div class="col-md-6">
                                <label><input type="radio" name="status" value="1" {{$category->status == 1 ? 'checked' : ''}}/> Published</label>
                                <label><input type="radio" name="status" value="0" {{$category->status == 0 ? 'checked' : ''}}/> Unpublished</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-2"></label>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary px-3" value="Update Existing Category"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
