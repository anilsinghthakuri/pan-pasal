<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand px-3" href="/dashboard">Dashbord</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav  navbar-nav--flex m-auto my-2  my-lg-0 navbar-nav-scroll">
            @can('pos')
            <li class="nav-item padding-left">
                <a class="nav-link  " aria-current="active" href="/pos"><i class="fa fa-credit-card"></i>
                    pos</a>
            </li>

            @endcan
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="tableId" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-table"></i>
                    Table
                </a>
                <ul class="dropdown-menu" aria-labelledby="tableId">
                    <li><a class="dropdown-item" href="/table"> Add Table</a></li>
                </ul>
            </li> --}}
            @can('view')
            <li class="nav-item dropdown">



                <a class="nav-link dropdown-toggle" href="#" id="productID" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-archive"></i>
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

            @endcan

            @can('view')

            <li class="nav-item">
                <a class="nav-link  " aria-current="active" href="#"> <i class="fa fa-hospital"></i> Store</a>
            </li>

            @endcan

            @can('view')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="productID" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-users"></i> People
                </a>
                <ul class="dropdown-menu" aria-labelledby="productID">

                    <li>
                        <a class="dropdown-item" href="/userlist">User List</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="/adduser">Add User</a>
                    </li>

                </ul>

            </li>
            @endcan



            @can('view')
            <li class="nav-item ">

                <a class="nav-link " href="/expense-list" id="saleID"><i class="fas fa-dollar-sign"></i>
                    Expenses
                </a>

            </li>
            @endcan


{{--
            @can('view')
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="/expense-list" id="expanseID" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-dollar-sign"></i>
                    Expense
                </a>

                {{-- <ul class="dropdown-menu" aria-labelledby="expanseID">

                    <li>
                        <a class="dropdown-item" href="/expense-add">Add Expenses</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="/expense-list">Expenses List</a>
                    </li>

                </ul> --}}

            {{-- </li>
            @endcan --}}




            @can('view')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoriesId" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-bookmark"></i> Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoriesId">

                    <li>
                        <a class="dropdown-item" href="/categories">Product Categories</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/expense-category">Expense Category
                        </a>
                    </li>


                </ul>

            </li>
            @endcan




            @can('view')
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="saleID" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-cogs"></i> Setting
                </a>

                <ul class="dropdown-menu" aria-labelledby="saleID">

                    <li>
                        <a class="dropdown-item" href="/companyprofile">Company Setting</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Printer Setting</a>
                    </li>

                </ul>

            </li>
            @endcan




            @can('view')
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="saleID" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-chart-line"></i> Report
                </a>

                <ul class="dropdown-menu" aria-labelledby="saleID">

                    <li>
                        <a class="dropdown-item" href="/total-sale">Total Sale</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/cash-sale">Cash Sale</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/order-sale">Sale Itemwise</a>
                    </li>

                </ul>

            </li>
            @endcan



        </ul>
        <ul class="d-flex flex-row justify-content-between ml-auto">
            <li class="nav-item">
                <p class=" icon-height  "><img src="{{asset('img/user1.png')}}" alt=""> {{Auth::user()->name}}
                </p>

            </li>
            <li class="nav-item">
                <a class=" icon-height  " aria-current="active" href="#"><img src="{{asset('img/nepal.png')}}"
                        alt=""> </a>
            </li>
            <li class="nav-item">
                <a class=" icon-logout  " aria-current="active" href="/logout"><i
                        class="fas fa-sign-out-alt"></i> </a>
            </li>

        </ul>

    </div>

</nav>
