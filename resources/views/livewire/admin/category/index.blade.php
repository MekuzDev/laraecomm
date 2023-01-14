<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@section('page_name')
                        Categories
                       @endsection</h4>
                      <div><a href="{{route('admin.showCreateCategory')}}" class="btn btn-primary">Add Category</a></div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                <tr>
                                    <th scope="row">{{$index + $categories->firstItem()}}</th>
                                    <td>{{$category->name}}</td>
                                    {{-- <td>{{$category->description}}</td> --}}
                                    <td>{{$category->image}}</td>
                                    <td>{{$category->status == '0' ? 'Visible' : 'Hidden'}}</td>
                                    <td><a href="{{route('admin.editCategory',$category)}}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="my-3 d-flex justify-content-end">
                            {{$categories->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
