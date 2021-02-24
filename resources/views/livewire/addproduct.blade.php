<div class="container-fluid">
    <div class="col-md-12">

        <div class="row">

            <div class="col-md-3 px-0">

                <nav class="side-menu" id="scrool-bar">

                    <h1 class="side-bar-title"><ul>  <li class="d-flex-div"><span><ion-icon name="speedometer-outline"></ion-icon></span> <a class="page-title" href='#message'> Dashbord</a></li></ul></h1>
                    <ul>

                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Add Product</a></li>
                        <li class='sub-menu '> <a href='#settings'> <span><ion-icon name="briefcase-outline"></ion-icon></span>    Settings<div class='fa fa-caret-down right'></div></a>
                            <ul class="hide">
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Account</a></li>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Profile</a></li>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Secruity &amp; Privacy</a></li>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Password</a></li>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Notification</a></li>
                            </ul>
                        </li>
                        <li class='sub-menu '>  <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Help<div class='fa fa-caret-down right'></div></a>
                            <ul>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> FAQ's</a></li>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Submit a Ticket</a></li>
                                <li><a href='#settings'> <span><i class="fa fa-circle-o" aria-hidden="true"></i> </span> Network Status</a></li>
                            </ul>
                        </li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>

                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>
                        <li class='sub-menu '> <a href='#message'><span><ion-icon name="briefcase-outline"></ion-icon></span>  Messages</a></li>


                    </ul>
                </nav>

            </div>

            <div class="col-md-9 mt-3 ">

                <div class="row">
                    <div class="col-md-12">
                        <div class="top-part">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-grow-1 bd-highlight menu__part"><img src="img/menu.png" alt="menu"></div>

                                <div class="p-2 bd-highlight login__part"><img class="login__img" src="img/user.png" alt="menu">Login</div>
                                </div>
                        </div>
                    </div>

                </div>
                <div class="row ">
                    <div class="col-md-12 pt-2">
                        <div class="add__categories_bottom">
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" >
                                Add Product
                                </button>


                        </div>

                    </div>
                </div>
                @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
                </div>
                @endif
                <form class="add__product__form" action="#">
                    <div class="row  mt-3">

                        <div class="col-md-4">

                                <label for="exampleInputEmail1" class="form-label">Category Name</label>

                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">type</label>
                                <select class="form-select" wire:model= 'category_id' id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                    @foreach ($categorylist as $item)
                                    <option value={{$item->category_id}}>{{$item->category_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                                <label for="exampleInputEmail1" class="form-label">Product Name</label>


                            <div class="input-group mb-3">
                                <label class="input-group-text" for="name">Name</label>
                                <input type="text" name="productname" wire:model = "product_name">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                                <label for="exampleInputEmail1" class="form-label">Product Price</label>


                            <div class="input-group mb-3">
                                <label class="input-group-text" for="productprice">Price</label>
                                <input type="number" name="productprice" id="" wire:model = 'product_price'>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <label for="exampleInputEmail1" class="form-label">Product Image</label>


                            <div class="input-group mb-3">
                                <label class="input-group-text" for="file">Image</label>
                                <input type="file" name="file" wire:model = 'product_image' id="" >
                                </select>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary" wire:click = 'addproduct'>Submit</button>
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
        </div>
    </div>
</div>
