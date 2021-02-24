@extends('layouts.master')

@section('components')

<div class="col-md-12 mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">Add Category</h2>
        </div>

       <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
       </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="add__table__list">
                @if ($category == Null)
                <form action="/categories" method="POST" enctype="multipart/form-data" class="mb-3">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Category Name</span>
                        <input type="text" class="form-control" required placeholder="Category Name" name="categoryname" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group  mb-3">

                        <input type="file" class="form-control" required  name="file" aria-label="Username"
                                aria-describedby="basic-addon1">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                @else

                <form action="/categories-update" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="id" value="{{$category->category_id}}">
                    <div class="input-group  mb-3">
                        <span class="input-group-text" id="basic-addon1">Category Name</span>
                        <input type="text" class="form-control" required value="{{$category->category_name}}" name="tablename" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group  mb-3">

                        <input type="file" class="form-control"  name="file" aria-label="Username"
                                aria-describedby="basic-addon1">

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/product"><button class="btn btn-danger">Cancel</button></a>
                </form>

                @endif

            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table__list__part ">
                <div class="table-responsive">
                <table class="table table-bordered bg-light">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category image</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categorylist as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->category_name}}</td>
                            <td><img class="table__images" src="/img/{{$item->category_image}}" alt="{{$item->category_image}}" height="25px" width="250px"></td>
                            <td class="d-flex">
                                <a href="/categories/{{$item->category_id}}"><button type="button" class="btn btn-primary action-btn"><i class="fas fa-edit"></i></button></a>

                                <a href="/categories-delete/{{$item->category_id}}"><button type="button" class="btn btn-danger action-btn"><i class="far fa-trash-alt"></i></button></a>

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

@endsection
