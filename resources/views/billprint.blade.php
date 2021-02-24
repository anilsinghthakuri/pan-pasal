<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bill.css">
    <meta http-equiv = "refresh" content = "3; url = /pos" />
    <title>Document</title>
</head>
<body>
    <div>
    </div>
    <div class="bill__section">
        <div class="bill__section__inner">
            <div class="bill__title text-center mb-2"><span>{{$companydata->company_name}}</span></div>
            <div class="bill__title  text-center mb-2"><span>{{$companydata->company_address}} </span></div>
            <div class="bill__title  text-center mb-2"><span>Tel. {{$companydata->company_number}}</span></div>
            <div class="bill__middle__contain">
                <div class="d-flex justify-content-evenly">
                    <div class="p-2 bd-highlight">Name:</div>
                    <div class="p-2 bd-highlight">{{$customer}}</div>
                    <div class="p-2 bd-highlight">Table:</div>
                    <div class="p-2 bd-highlight">{{$table_name}}</div>
                  </div>
            </div>
            <div class="bill__middle__inner text-center">
                <div class="p-2 bd-highlight"><span>{{$datentime}}</span></div>

            </div>

            <div class="menu__item">
                <div class="table-responsive">
                <table class="table table-borderless table-responsive ">
                    <thead>
                      <tr>

                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Price</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdata as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->product->product_name}}</td>
                            <td>{{$item->order_quantity}}</td>
                            <td class="quantity">{{$item->order_subprice}}</td>
                          </tr>
                        @endforeach


                    </tbody>
                </table>
                </div>
            </div>
            <div class="bill__footer__contain mb-2">

                <div class="d-flex bd-highlight mb-3">
                    <div class="me-auto p-2 bd-highlight total__sum"></div>

                    <div class="p-2 bd-highlight "></div>
                    <div class="p-2 bd-highlight total__sum">Total</div>
                    <div class="p-2 bd-highlight "></div>
                    <div class="p-2 bd-highlight total__sum">{{$total_price}}</div>
                </div>
            </div>
            <div class="bill__title text-center mb-2"><span>Thank You</span></div>
            <div class="bill__title  text-center mb-2"><span>Visit again  </span></div>
        </div>

    </div>
</body>

<script>
    window.print();
</script>
</html>
