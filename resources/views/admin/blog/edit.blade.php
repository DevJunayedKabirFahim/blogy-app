@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="card-title">Edit Blog</h3>
                </div>

                <p class="text-success text-center">{{session('message')}}</p>
                <div class="card-body">
                    <form action="{{route('blog.update', ['id' => $blog->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-2">Category Name</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category_id">
                                    <option disabled selected>--select an option--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$blog->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-2">Blog Title</label>
                            <div class="col-md-6">
                                <input type="text" name="title" id="name" value="{{$blog->title}}" class="form-control" placeholder="Write blog title" required/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-2">Blog Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="summernote form-control" placeholder="Write blog description">{{$blog->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-2">Blog Image</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" class="form-control-file"/>
                                <img src="{{asset($blog->image)}}" alt="" height="100" width="120"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-2">Publication Status</label>
                            <div class="col-md-6">
                                <label><input type="radio" name="status" value="1" {{$blog->status == 1 ? 'checked' : ''}}/> Published</label>
                                <label><input type="radio" name="status" value="0" {{$blog->status == 0 ? 'checked' : ''}}/> Unpublished</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-2"></label>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary px-3" value="Update Existing Blog"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
