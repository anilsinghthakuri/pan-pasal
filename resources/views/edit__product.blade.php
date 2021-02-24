@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    <div class="row">
        <div class="col-md-12">
            <div class="top-part">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight menu__part"><img src="/img/menu.png" alt="menu"></div>

                    <div class="p-2 bd-highlight login__part"><img class="login__img" src="/img/user.png"
                            alt="menu">Login</div>
                </div>
            </div>
        </div>

    </div>
    <div class="row ">
        <div class="col-md-12 pt-2">
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <a href="/product"><button type="button" class="btn btn-primary">
                        Product List
                    </button></a>


            </div>

        </div>
    </div>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
       </div>

    <form class="add__product__form" action="/product-update" method="POST" enctype="multipart/form-data">
        <div class="row  mt-3">
            @csrf
            <div class="col-md-4">
                <input type="hidden" name="id" value="{{$product->product_id}}">
                <label for="exampleInputEmail1" class="form-label">Category Name</label>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">type</label>
                    <select class="form-select" name="category_id"  id="inputGroupSelect01">
                        <option >Choose...</option>
                        @foreach ($categorylist as $item)
                        <option {{ $product->category_id == $item->category_id? 'selected' : '' }} value='{{$item->category_id}}'  >{{$item->category_name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-md-4">

                <label for="exampleInputEmail1" class="form-label">Product Name</label>

                <!--<div class="input-group mb-3">
                    <label class="input-group-text" for="name">Name</label>
                    <input type="text" name="productname">
                    </select>
                </div>-->

                <div class="input-group mb-3">
                    <span class="input-group-text"  for="name" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="productname" id="" value={{$product->product_name}} aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>
            <div class="col-md-4">

                <label for="exampleInputEmail1" class="form-label">Product Price</label>


                <!--<div class="input-group mb-3">
                    <label class="input-group-text" for="productprice">Price</label>
                    <input type="number" name="productprice" id="">
                    </select>
                </div>-->

                <div class="input-group mb-3">
                    <span class="input-group-text"  for="productprice" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="number" class="form-control" name="productprice" id="" value="{{$product->product_price}}" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>
            <div class="col-md-4">

                <div class=" mb-3">
                    <label for="formFile" class="form-label">Images</label>
                    <input class="form-control" type="file" value="{{$product->product_image}}" name="file">
                    </select>
                </div>


            </div>

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/product"><button class="btn btn-danger">Cancel</button></a>
    </form>




</div>
@endsection
