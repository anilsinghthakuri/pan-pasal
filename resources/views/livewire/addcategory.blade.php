
<div>
    <div class="row ">
        <div class="col-md-12 pt-2">
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Categories
                </button>

                <!-- Modal -->
                <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="m-2" wire:submit.prevent="addcategory" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Name *</label>
                                                <input type="text" id="name" wire:model='category_name' class="form-control"
                                                    placeholder="Name">
                                                @error('category_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <label for="name" class="form-label"> Images
                                                    *</label>
                                            </div>
                                            <div class="input-group  ">
                                                <input type="file" class="form-control" id="inputGroupFile02"
                                                    wire:model='category_image'>
                                            </div>
                                            @error('category_image') <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="submit p-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row  mt-3">
        <div class="col-md-12">
            <div class="categories-tables">
                <div class="table-responsive">
                <table class="table table-bordered bg-light ">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td class="image-categories "><img class="img__product table__images"
                                src="storage/{{$item->category_image }}" class="img-fluid" alt="..."></td>

                            <td>{{$item->category_name}}</td>
                            <td class="action-table">
                                <div class=" dropstart">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                wire:click='deletecategory({{$item->category_id}})'>Delete</a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>

</div>


