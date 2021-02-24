@extends('layouts.master')

@section('components')

<div class="col-md-12 mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">Customer</h2>
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
                @if ($customerdata == Null)
                <form method="POST" action="/customer" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Text</span>
                        <input type="text" class="form-control" required placeholder="Customer Name" name="customername"
                            aria-label="YourName" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="number" class="form-control" required placeholder="Customer Phone"
                            name="customerphone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">**</span>
                        <input type="text" class="form-control" placeholder="Customer Address" name="customeraddress"
                            aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" value="Login" class="btn btn-primary">Add</button>
                </form>
                @else
                <form method="POST" action="/customer-update" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$customerdata->customer_id}}">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Text</span>
                        <input type="text" class="form-control" required value="{{$customerdata->customer_username}}" name="customername"
                            aria-label="YourName" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="number" class="form-control" required value="{{$customerdata->customer_phone}}"
                            name="customerphone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">**</span>
                        <input type="text" class="form-control" value="{{$customerdata->customer_address}}" name="customeraddress"
                            aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" value="Login" class="btn btn-primary">Update</button>
                    <a href="/customer"><button class="btn btn-danger">Cancel</button></a>
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
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Phone</th>
                        <th scope="col">Customer Address</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($customerlist as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->customer_username}}</td>
                        <td>{{$item->customer_phone}}</td>
                        <td>{{$item->customer_address}}</td>
                        @if ($item->customer_id == '1')
                            <td>Non-deletable</td>
                             @continue
                        @endif
                        <td>
                            <a href="/customer/{{$item->customer_id}}"><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                            <a href="/customer-delete/{{$item->customer_id}}"><button type="button"
                                    class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>
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
