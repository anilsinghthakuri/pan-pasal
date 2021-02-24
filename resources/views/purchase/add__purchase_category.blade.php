@extends('layouts.master')

@section('components')
<div class="col-md-9 mt-3 ">

    <div class="row">

        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">Purchase Category</h2>
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
                @if ($categories_purchase == Null)
                <form action="/purchase-category" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Add</span>
                        <input type="text" class="form-control" placeholder="Categories name" required name="categoryname"
                            aria-label="Username" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @else
                <form action="/purchase-category-update" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="id" value="{{$categories_purchase->purchase_category_id}}">
                        <span class="input-group-text" id="basic-addon1">Add</span>
                        <input type="text" class="form-control" value="{{$categories_purchase->purchase_category_name}}" name="categoryname"
                            aria-label="Username" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/purchase-category"><button class="btn btn-danger mx-1">Cancel</button></a>
                    </div>
                </form>


                @endif
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="table__list__part ">
                <div class="table-responsive">
                <table class="table table-bordered bg-light table-responsiv">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Categories Name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($purchase_category as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$item->purchase_category_name}}</td>
                            <td>
                                <a href="/purchase-category/{{$item->purchase_category_id}}"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                <a href="/purchase-category-delete/{{$item->purchase_category_id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></button></a>
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
