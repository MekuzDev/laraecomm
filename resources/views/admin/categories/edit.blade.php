@extends('layouts.admin')

@section('page_name')
Update {{$category->name}} Category
@endsection


@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">

            <div class="card-body">
                <form action="{{route('admin.editCategory',$category)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="row">
                            <div class=" col-md-6 mb-4">
                                <label for="name">Category Name:</label>
                                <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{$category->name}}">
                                <small class="text-danger">
                                    @error('name')
                                     {{$message}}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="slug">Slug:</label>
                                <input class="form-control form-control-sm @error('slug') is-invalid @enderror" name="slug" value="{{$category->slug}}" type="text">
                                <small class="text-danger">
                                    @error('slug')
                                     {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="name">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror form-control-sm" style="resize:none" row="3">{{$category->description}}</textarea>
                            <small class="text-danger">
                                @error('description')
                                 {{$message}}
                                @enderror
                            </small>
                        </div>


                            <div class=" col-md-12 mb-4">
                                <label for="imgae">Image:</label>
                                <input class="form-control  @error('image') is-invalid @enderror form-control-sm" id="image" value="{{$category->image}}" name="image" type="file">
                                <small class="text-danger">
                                    @error('image')
                                     {{$message}}
                                    @enderror
                                </small>
                                <div>

                                    <img class="img-responsive" width="100" src="{{asset('uploads/categories/'.$category->image)}}" alt="">
                                </div>
                            </div>
                            <div class="mb-4" style="display: flex;">

                                 Status:
                                 <input class="form-check mx-3" {{ $category->status == '1' ? 'Checked' : ''}} name="status" type="checkbox">
                            </div>


                        <div class="row">
                            <div class=" col-md-12 mb-4">
                                <label for="name">Meta Title:</label>
                                <input class="form-control @error('meta_title') is-invalid @enderror  form-control-sm" id="meta_title" name="meta_title" value="{{$category->meta_title}}" type="text">
                                <small class="text-danger">
                                    @error('meta_description')
                                     {{$message}}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="slug">Meta Description:</label>
                                <textarea class="form-control form-control-sm  @error('meta_description') is-invalid @enderror" name="meta_description" style="resize: none">{{$category->meta_description}}</textarea>
                                <small class="text-danger">
                                    @error('meta_description')
                                     {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                                <label for="slug">Meta keyword:</label>
                                <textarea class="form-control  @error('meta_keyword') is-invalid @enderror form-control-sm" name="meta_keyword" style="resize: none">
                                {{$category->meta_keyword}}</textarea>
                                <small class="text-danger">
                                    @error('meta_keyword')
                                     {{$message}}
                                    @enderror
                                </small>
                            </div>
                        <div class="mb-4">
                            <input class="btn btn-primary" value="Update Category" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
    <!-- end card -->
</div>
@endsection
