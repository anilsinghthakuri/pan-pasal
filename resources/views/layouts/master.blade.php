<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pos Billing System</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="{{asset('font/fonts.css')}}">

    @livewireStyles

</head>

<body>
    <section class="add__categories">




                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                            <a class="navbar-brand px-3" href="/dashboard">Dashbord</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav  navbar-nav--flex m-auto my-2  my-lg-0 navbar-nav-scroll">
                                    <li class="nav-item padding-left">
                                        <a class="nav-link  " aria-current="active" href="/pos"><i class="fa fa-credit-card"></i> pos</a>
                                    </li>
                                           <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="tableId"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-table"></i>
                                            Table
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="tableId">
                                            <li><a class="dropdown-item" href="/table"> Add Table</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="productID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-archive"></i>
                                            Product
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="productID">

                                            <li>
                                                <a class="dropdown-item" href="/add-product">Add Product</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/product">Product List</a>
                                            </li>


                                        </ul>

                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link  " aria-current="active" href="#"> <i class="fa fa-hospital"></i> Store</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="productID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-users"></i> People
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="productID">

                                            <li>
                                                <a class="dropdown-item" href="#">Waiters</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Customers</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Suppliers</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="saleID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ticket-alt"></i>
                                            Sale
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="saleID">


                                            <li>
                                                <a class="dropdown-item" href="/total-sale">Total Sale</a>
                                            </li>


                                            <li>
                                                <a class="dropdown-item" href="/credits">Credit Collection </a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="expanseID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-dollar-sign"></i>
                                            Expense
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="expanseID">

                                            <li>
                                                <a class="dropdown-item" href="/expense-add">Add Expenses</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="/expense-list">Expenses List</a>
                                            </li>

                                        </ul>

                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="categoriesId"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-bookmark"></i> Categories
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="categoriesId">

                                            <li>
                                                <a class="dropdown-item" href="/categories">Add & show categories List</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/expense-category">Expense Category
                                                </a>
                                            </li>


                                        </ul>

                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link  " aria-current="active" href="#"><i class="fa fa-cogs"></i> Setting</a>
                                    </li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="saleID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-chart-line"></i> Report
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="saleID">

                                            <li>
                                                <a class="dropdown-item" href="/customer">Add Customer</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="/cash-sale">Cash Sale</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/credit-sale">Credit Sale</a>
                                            </li>

                                        </ul>

                                    </li>



{{--
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Table
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                            <li><a class="dropdown-item" href="/table"><i class="fa fa-credit-card"></i> Add Table</a></li>

                                        </ul>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="productID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Product
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="productID">

                                            <li>
                                                <a class="dropdown-item" href="/add-product">Add Product</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/product">Product List</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/categories">Add & show categories List</a>
                                            </li>

                                        </ul>

                                    </li>

                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="saleID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sale
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="saleID">
                                            <li>
                                                <a class="dropdown-item" href="/pos">POS
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/customer">Add Customer</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/total-sale">Total Sale</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/cash-sale">Cash Sale</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/credit-sale">Credit Sale</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="/credits">Credit Collection </a>
                                            </li>
                                        </ul>

                                    </li>

                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="purchaseID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Purchase
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="purchaseID">

                                            <li>
                                                <a class="dropdown-item" href="#">Add Purchase</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="#">Purchase List</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Purchase Category
                                                </a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="expanseID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Expense
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="expanseID">

                                            <li>
                                                <a class="dropdown-item" href="/expense-add">Add Expenses</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="/expense-list">Expenses List</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/expense-category">Expense Category
                                                </a>
                                            </li>
                                        </ul>

                                    </li>

                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="assetsId"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Assets
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="assetsId">

                                            <li>
                                                <a class="dropdown-item" href="/assets">Assets</a>
                                            </li>
                                        </ul>

                                    </li>

                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="reportsId"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Reports
                                        </a>

                                    </li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="userID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            User
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="userID">

                                            <li>
                                                <a class="dropdown-item" href="/userlist">User List
                                                </a>
                                            </li>

                                            <li>
                                                <a  class="dropdown-item" href="/adduser">Add User</a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li class="nav-item dropdown">

                                        <a class="nav-link dropdown-toggle" href="#" id="generalID"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            General Setting
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="generalID">

                                            <li>
                                                <a class="dropdown-item" href="/companyprofile">Company Profile
                                                </a>
                                            </li>

                                            <li>
                                                <a  class="dropdown-item" href="#settings">Printer Setting</a>
                                            </li>
                                        </ul>

                                    </li>--}}


                                </ul>
                                <ul class="d-flex flex-row justify-content-between ml-auto">
                                    <li class="nav-item">
                                        <p class=" icon-height  "><img src="img/user1.png" alt=""> {{Auth::user()->name}}</p>

                                    </li>
                                    <li class="nav-item">
                                        <a class=" icon-height  " aria-current="active" href="#"><img src="img/nepal.png" alt=""> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" icon-logout  " aria-current="active" href="/logout"><i class="fas fa-sign-out-alt"></i> </a>
                                    </li>


                                    {{-- <li class="nav-item dropdown">
                                        <button type="button" id="dropdownlogin" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-outline-secondary dropdown-toggle">Logout <span class="caret"></span></button>


                                        <ul class="dropdown-menu" aria-labelledby="dropdownlogin">

                                            <li>
                                                <a class="dropdown-item" href="/companyprofile">Confirm
                                                </a>
                                            </li>


                                        </ul>

                                    </li> --}}
                                </ul>



                            </div>

                    </nav>




        <div class="container">
            <div class="col-md-12 body-class ">

                <div class="row">

                    {{-- <div class="col-md-3 sidebar__col__div px-0">

                        @include('layouts.nav')

                    </div> --}}

                    @yield('components')
                </div>
            </div>
        </div>

    </section>


    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

    <script src="/js/script.js"></script>
    @livewireScripts


    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

</body>

</html>
