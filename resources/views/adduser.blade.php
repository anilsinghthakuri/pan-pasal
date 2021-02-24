@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

    </div>
    <div class="row ">
        <div class="col-md-12 pt-2">
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <a href="/userlist"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    User List
                </button></a>

            </div>

        </div>
    </div>
    <div class="row  mt-3">
        <div class="col-md-12">
            <div class="add__user__section">
                <div class="login__contain login__contain--user">
                    <h4 class="add__user__title  my-3 mb-3">you can add user here</h4>
                    <form method="POST" action="/adduser" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Text</span>
                            <input type="text" class="form-control" placeholder="Name" name="name" aria-label="YourName"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">**</span>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                aria-describedby="basic-addon1">
                        </div>

                        <button type="submit" value="Login" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>

    </div>

</div>
@endsection

