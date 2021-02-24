<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
      </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a class="user-name" href="/dashboard">Dashboard</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                  </div>
                <div id="close-sidebar">

                    <a class="pos__link" href="/pos">POS <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded"
                        src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                        alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">{{Auth::user()->name}}
                        {{-- <strong>Bist</strong> --}}
                    </span>
                    <span class="user-role">HOT plate resturant & cafe</span>

                </div>
            </div>

            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Table</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="/table">Add Table
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Product</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="/add-product">Add Product</a>
                                </li>
                                <li>
                                    <a href="/product">Product List</a>
                                </li>
                                <li>
                                    <a href="/categories">Add & show categories List</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Sale</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="/pos">POS
                                    </a>
                                </li>
                                <li>
                                    <a href="/customer">Add Customer</a>
                                </li>
                                <li>
                                    <a href="/total-sale">Total Sale</a>
                                </li>
                                <li>
                                    <a href="/cash-sale">Cash Sale</a>
                                </li>
                                <li>
                                    <a href="/credit-sale">Credit Sale</a>
                                </li>

                                <li>
                                    <a href="/credits">Credit Collection </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Purchase</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="#">Add Purchase</a>
                                </li>

                                <li>
                                    <a href="#">Purchase List</a>
                                </li>
                                <li>
                                    <a href="#">Purchase Category
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Expense</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="/expense-add">Add Expenses</a>
                                </li>

                                <li>
                                    <a href="/expense-list">Expenses List</a>
                                </li>
                                <li>
                                    <a href="/expense-category">Expense Category
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Assets</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="/assets">Assets</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-file-audio-o" aria-hidden="true"></i>
                            <span>Reports</span>

                        </a>

                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>User</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="/userlist">User List
                                    </a>
                                </li>
                                <li>
                                    <a href="/adduser">Add User</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span>General Setting</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="/companyprofile">Company Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">Printer Setting</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                            <span>Update</span>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <span>Logout</span>
                            <span class="badge badge-pill badge-primary"></span>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                {{-- <span class="badge badge-pill badge-warning notification">3</span> --}}
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
                {{-- <span class="badge badge-pill badge-success notification">7</span> --}}
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                {{-- <span class="badge-sonar"></span> --}}
            </a>
            <a href="/logout">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->

</div>
