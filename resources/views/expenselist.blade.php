@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    <div class="row ">

        <div class="col-md-12 pt-2">
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <h2>Expenses List</h2>


            </div>
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <a href="/expense-add"><button type="button" class="btn btn-primary">
                       Add Expenses
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

                <table class="table table-bordered bg-light ">

                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Date</th>
                            <th scope="col">Bill No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Amount </th>
                            <th scope="col">Remark </th>


                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($expense_list as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$item->nepali_date}}</td>
                            <td>
                                {{$item->expense_bill}}
                            </td>
                            <td> {{$item->expense_category_id}}</td>
                            <td>{{$item->expense_vendor}}</td>
                            <td>{{$item->expense_price}}</td>
                            <td>{{$item->expense_remark}}</td>
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
