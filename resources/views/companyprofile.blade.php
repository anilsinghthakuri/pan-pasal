@extends('layouts.master')

@section('components')


<div class="col-md-12 mt-3">

    <div class="row">
        <div class="col-md-12">
            <h2 class="add__table__title mb-4 mt-4">Company Profile</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="company__profile">

                <form action="/companyprofile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="company_id" value="{{$companyinfo->company_id}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" required value="{{$companyinfo->company_name}}" name="companyname" id=""  aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" required value="{{$companyinfo->company_address}}" name="companyaddress" id=""  aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="number" class="form-control" required value="{{$companyinfo->company_number}}" name="companynumber" id="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="class-profile-images">
                                <img class="profile-images" src="/img/{{$companyinfo->company_logo}}" height="50" height="10" alt="">
                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="file"  name="companyimage"  class="form-control" id="inputGroupFile02">
                                <label class="input-group-text"  name="companyimage" id="" for="inputGroupFile02">Upload</label>
                              </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" required name="companycurrency" id="" value="{{$companyinfo->company_currency}}" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary">Change</button>



                </form>

            </div>
        </div>

    </div>

</div>

@endsection
