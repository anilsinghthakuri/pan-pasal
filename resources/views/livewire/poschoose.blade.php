<div class="item__images">
    <div class="row">
        <div class="col-md-12">
            <div class="top-part">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight menu__part">
                        <a href="/dashboard">
                            <button type="button" class="btn btn-primary font-btn-part">
                                <img src="img/menu.png" alt="menu"> Dashbord
                            </button>
                        </a>

                    </div>
                    <!--<div class="p-2 bd-highlight help__part"><img src="img/help.svg" alt="menu">Help</div>-->
                    <div class="p-2 bd-highlight ">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle font-btn-part"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="login__img" src="img/user.png" alt="menu"> {{Auth::user()->name}}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/adduser">Add User</a></li>
                                <li><a class="dropdown-item" href="/logout">Log out</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-sm-12">
            <div class="row row__margin">
                <div class="col-sm-12">
                    <form class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search food by name"
                            wire:model='search' aria-label="Search" id="">
                        <button class=" btn-search transition__btn">Search</button>
                    </form>
                </div>
            </div>

            {{-- <div class="btn__full_width"><input type="text" placeholder="search food by name" wire:model='search' name="search" id=""></div> --}}

        </div>
        {{-- <div class="col-sm-4">
            <div class="btn__full_width"><button type="button" wire:click='alcohol'
                    class="btn btn-info btn-md text-light"><span class="span__categories">Alcohol</span></button> </button></div>
        </div> --}}

    </div>
    <div class="row">

        <div class="col-sm-4">

            <div class="btn__full_width"><button onclick="openNav()" type="button" class="btn btn-success btn-md">
                    <span class="span__categories">Category</span></button></div>

        </div>
        <div class="col-sm-4">
            <div class="btn__full_width"><button type="button" wire:click='alcohol'
                    class="btn btn-info btn-md text-light"><span class="span__categories">Alcohol</span></button>
                </button></div>
        </div>
        <div class="col-sm-4">
            <div class="btn__full_width"><button type="button" wire:click='allproduct'
                    class="btn btn-danger btn-md "><span class="span__categories">All Product</span></button></div>
        </div>

    </div>
    <div class="scroll__class">


        <div class="all__product">

            <div class="row row-cols-5" value="PLAY">
                @foreach ($product as $products)
                <div class="col px-0" onclick="play()" wire:click='addproduct({{$products->product_id}})'>
                    <div class="item__items item__height item__hover">
                        <div class="image__inner">
                            <img src="img/{{$products->product_image}}" class="card-img-top" alt="...">
                        </div>

                        <div class="card-detail text-center">
                            <h5 class="card-title"> {{$products->product_name}}</h5>
                            <p class="card-text">RS:{{$products->product_price}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
    {{-- <div class="row pagination__right">
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

    <!--sidebar show -->
    <div id="categories__part" class="side__show ">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="p-3">
            <h4 class="text-light bg-primary px-5 py-3 ">Categories</h4>

            <div class="all__product ">

                <div class="row row-cols-5" value="PLAY" onclick="play()">
                    @foreach ($categorylist as $item)
                    <div class="col px-0" wire:click='choosecategory({{$item->category_id}})'>
                        <div class="item__items item__height item__hover">
                            <div class="image__inner">
                                <img src="/img/{{$item->category_image }}" class="card-img-top" alt="...">
                            </div>

                            <div class="card-detail text-center">
                                <h5 class="card-title"> {{$item->category_name}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>

        </div>


    </div>

</div>
<script>
    function openNav() {
        document.getElementById("categories__part").style.width = "700px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("categories__part").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

</script>
