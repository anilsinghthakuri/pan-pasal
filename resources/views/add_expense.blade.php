@extends('layouts.master')

@section('components')
<div class="col-md-12 mt-3 ">

    <div class="row ">
        <div class="col-md-12 pt-2">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div class="add__categories_bottom">
                <!-- Button trigger modal -->
                <a href="/expense-list"><button type="button" class="btn btn-primary">
                       List Expenses
                    </button></a>


            </div>

        </div>
    </div>


    <form class="add__product__form" action="/expense-add" method="POST" enctype="multipart/form-data">
        <div class="row  mt-3">
            @csrf

            <div class="col-md-6">

                <label for="exampleInputEmail1" class="form-label">Expenses Category </label>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">type</label>
                    <select class="form-select" required name="expense_category_id" id="inputGroupSelect01">
                        @foreach ($expense_category as $item)
                        <option value={{$item->expense_category_id}}>{{$item->expense_category_name}}</option>
                        @endforeach


                    </select>
                </div>
            </div>
            <div class="col-md-6">

                <label for="expensebill" class="form-label">Bill  No</label>

                <div class="input-group mb-3">
                    <span class="input-group-text"  for="expensebill" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="number" class="form-control" name="expensebill" id="" placeholder=" Number" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>
            <div class="col-md-6">

                <label for="expense_price" class="form-label">Bill Amount</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"  for="expense_price" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="number" class="form-control"  name="expenseprice" id="" placeholder="Amount" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>
            <div class="col-md-6">

                <label for="expense_price" class="form-label">Vendor</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"  for="expense_price" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="text" class="form-control"  name="expensevendor" id="" placeholder="Vendor Name" aria-label="Username" aria-describedby="basic-addon1">
                </div>

            </div>
            <div class="col-sm-12">


                <div class="input-group mb-3">
                    <span class="input-group-text">Remark</span>
                    <textarea class="form-control" name="expenseremark" aria-label="With textarea"></textarea>
                  </div>


            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    {{-- <div class="row pagination__right pagination__add_product">
        <div class="d-flex flex-row-reverse">
            <nav aria-label="Page ">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>

    </div> --}}

</div>
@endsection
