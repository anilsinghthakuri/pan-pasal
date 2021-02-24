@extends('layouts.master')

@section('components')

<div class="col-md-12 mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">Add Tables</h2>
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
                @if ($table == Null)
                <form action="/table" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Add</span>
                        <input type="text" class="form-control" required placeholder="Table name" name="tablename" aria-label="Username"
                            aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @else
                <form action="/table-update" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="id" value="{{$table->table_id}}">
                        <span class="input-group-text" id="basic-addon1">Add</span>
                        <input type="text" class="form-control" required value="{{$table->table_name}}" name="tablename" aria-label="Username"
                            aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-primary">update</button>
                        <a href="/table"><button class="btn btn-danger mx-3">Cancel</button></a>
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
                            <th scope="col">Table Name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tablename as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->table_name}}</td>
                            <td>
                                <a href="/table/{{$item->table_id}}"><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a>

                                <a href="/table-delete/{{$item->table_id}}"><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>
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
