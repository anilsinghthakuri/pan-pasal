@extends('layouts.master')

@section('components')

<div class="col-md-12 mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">Add Assets</h2>
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
                @if ($asset == Null)
                <form action="/assets" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Add</span>
                        <input type="text" class="form-control" required placeholder="Item Name" name="itemname" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Quantity</span>
                        <input type="number" class="form-control" required placeholder="Item Quantity" name="quantity" aria-label="Username"
                            aria-describedby="basic-addon1">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @else
                <form action="/assets-update" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="id" value="{{$asset->asset_id}}">
                        <span class="input-group-text" id="basic-addon1">Add</span>
                        <input type="text" class="form-control" required value="{{$asset->item_name}}" name="itemname" aria-label="Username"
                            aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1">Quantity</span>
                            <input type="text" class="form-control" required value="{{$asset->quantity}}" name="quantity" aria-label="Username"
                                aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">update</button>
                        <a href="/assets"><button  class="btn btn-danger mx-1">cancel</button></a>
                    </div>
                </form>


                @endif

            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table__list__part ">
                <div class="table-responsive">
                <table class="table table-bordered bg-light table-responsiv">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($assetlist as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td> <a href="/assets/{{$item->asset_id}}"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>  <a href="/assets-delete/{{$item->asset_id}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
