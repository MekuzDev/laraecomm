<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div wire:ignore.self id="deleteCategoryModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='destroyCategory'>


                    <div class="modal-body">
                        <h6>Are you sure, you want to delete category ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Yes, delete</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>



    <div class="row">

        <div class="col-lg-12">
            <div id="alert" class="alert alert-success alert-dismissible fade "  role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                 <span class="message">

                 </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

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
                                    <td><a href="{{route('admin.editCategory',$category)}}" class="btn btn-success">Edit</a></td>
                                    <td><button
                                        type="button"
                                        class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal"
                                        data-bs-target="#deleteCategoryModal"
                                        wire:click='deleteCategory({{$category->id}})'
                                        >Delete</button>
                                    </td>
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

@push('script')
<script>
        $('#alert').css({
            'display':'none'
        })

    window.addEventListener('close-modal',event=>{
        $('#deleteCategoryModal').modal('hide');
        $('#alert').addClass('show')
        $('.message').text('Category Deleted Successfully')
    })
</script>
@endpush
