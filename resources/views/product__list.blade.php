@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="top-part">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight menu__part"><img src="img/menu.png" alt="menu"></div>

                    <div class="p-2 bd-highlight login__part"><img class="login__img" src="img/user.png"
                            alt="menu">Login</div>
                </div>
            </div>
        </div>

    </div> --}}
    <div class="row ">
        <div class="col-md-12 pt-2">
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <a href="/add-product"><button type="button" class="btn btn-primary">
                        Add Product
                    </button></a>


            </div>

        </div>
    </div>
    <div class="row  mt-3">
        <div class="col-md-12">
            <div class="categories-tables">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                   </div>
                   <div class="table-responsive">

                <table class="table table-bordered bg-light table-responsiv">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Category Id</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productlist as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td class="image-categories"><img class="img__product" src="img/{{$item->product_image}}"
                                    class="img-fluid" alt="...">
                            </td>

                            <td>{{$item->product_name}}</td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->category_id}}</td>
                            <td>{{$item->product_price}}</td>
                            <td >

                                   <a href="/product-edit/{{$item->product_id}}">

                                    <button type="button" class="btn btn-primary "><i class="fas fa-edit"></i></button></a>

                                    <a href="/product-delete/{{$item->product_id}}"></button>
                                        <button type="button" class="btn btn-danger "><i class="far fa-trash-alt"></i></button></a>


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

