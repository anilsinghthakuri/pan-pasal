@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    <div class="row ">

        <div class="col-md-12 pt-2">
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <h2>Cash Sale</h2>


            </div>
            {{-- <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <a href="/expense-add"><button type="button" class="btn btn-primary">
                       Add Expense
                    </button></a>


            </div> --}}

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
                <table class="table table-bordered bg-light">

                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Date</th>
                            <th scope="col">Bill No</th>
                            <th scope="col">Table</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Bill Total Amount</th>

                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cash_sale_report as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$item->nepali_date}}</td>
                            <td>
                                {{$item->bill_id}}
                            </td>
                            <td> {{$item->table->table_name}}</td>
                            <td>{{$item->payment_method->payment_method_name}}</td>
                            <td>{{$item->customer->customer_username}}</td>
                            <td>{{$item->bill_total_amount}}</td>
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
