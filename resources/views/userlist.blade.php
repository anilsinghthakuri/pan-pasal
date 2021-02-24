@extends('layouts.master')



@section('components')

    <div class="col-md-12 mt-3">

    <div class="row">
        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">User List</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="table__list__part ">
                <div class="table-responsive">
                <table class="table table-bordered bg-light table-responsiv">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col"> Email</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userlist as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td> <a href="/user-delete{{$item->id}}"><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>  </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
