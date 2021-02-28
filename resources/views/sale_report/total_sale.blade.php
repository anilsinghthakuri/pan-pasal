@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    <div class="row ">

        <div class="col-md-2 ">
            <div class="  add__categories_bottom">
                <!-- Button trigger modal -->
                <h2>Total Sale</h2>
            </div>


        </div>
        <div class="col-md-4 ">
            <div class=''>
                <!-- Button trigger modal -->
                <a href="/export-bill"><button class="btn btn-primary mx-5 btn-sm my-3">Excel report download</button></a>

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
                            <th scope="col">S.N</th>
                            <th scope="col">Date</th>
                            <th scope="col">Bill No</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Bill Total Amount</th>


                        </tr>

                    </thead>

                    <tbody>
                        @foreach ($total_sale_report as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$item->nepali_date}}</td>
                            <td>
                                {{$item->bill_id}}
                            </td>
                            <td>{{$item->payment_method->payment_method_name}}</td>
                            <td>{{$item->bill_total_amount}}</td>

                        @endforeach


                    </tr>
                    <th colspan="4">Total Amount</th>
                        <td>{{$amount}}</td>



                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
