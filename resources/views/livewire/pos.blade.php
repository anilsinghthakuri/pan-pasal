<div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="d-flex justify-content-center">

                    {{-- <div class="btn__full_width p-2"><button type="button" class="btn btn-danger btn-md">KHALTI</button>
                    </div> --}}
                    <div class="btn__full_width "><button type="button" onclick="play()" wire:click = "kot_bill_print({{$table}})"  class="btn btn-success btn-md px-5 mb-3 P-class-btn">KOT</button>
                    </div>
                    <div class="btn__full_width mx-2"><button type="button" onclick="play()"  class="btn btn-info btn-md px-5 mb-3 P-class-btn"  data-bs-toggle="modal" data-bs-target="#table_shift_toggle">Table Shift</button>
                    </div>
                    <div class="btn__full_width"><button type="button" value="PLAY" onclick="play()" wire:click = "changecalc($table,$grandprice)" class="btn btn-danger btn-md px-5 mb-3 P-class-btn"
                            data-bs-toggle="modal" data-bs-target="#cash_toggle">Check Out</button></div>
                </div>
            </div>
        </div>
    </div>


    <!-- cash modal  -->
    <div class="modal fade" wire:ignore.self id="cash_toggle" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cash_toggleLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="cash_toggleLabel">Billing Sale</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body ">
                    <div class="container-fluid">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="R__amount" class="form-label">Total Amount *</label>
                                        <span  class="form-text">
                                            RS: {{$grandprice}}
                                        </span>

                                    </div>
                                    <div class="mb-3">

                                        <label for="R__change" class="form-label">Change:</label><br>
                                        <span id="R__change--number" class="form-text">
                                            RS: {{$changeamount}}
                                        </span>

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="mb-3">

                                        <label for="P__amount" class="form-label">Paying Amount *</label>
                                        <input type="number" class="form-control" wire:model = "payingamount" id="P__amount">

                                    </div>
                                    <div class="mb-3">

                                        <label for="Payed__by" class="form-label">Payed  By *</label>
                                        <select class="form-select" wire:model = 'payment'  aria-label="Default select example">
                                            <option selected >Choose the payment method</option>
                                            @foreach ($paymentmethodlist as $item)
                                            <option  value='{{$item->payment_method_id}}' >{{$item->payment_method_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                @if ($payment  == 2)
                                    <div class="col-md-6 ">

                                        <div class="mb-6">

                                            <label for="Payed__by" class="form-label">Customer Select</label>
                                            <select class="form-select" wire:model = 'customer' aria-label="Default select example">
                                                <option >Choose Customer</option>
                                                @foreach ($customerlist as $item)
                                                @if ($item->customer_id == '1')
                                                        @continue
                                                @endif
                                                <option selected value={{$item->customer_id}}>{{$item->customer_username}}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div>


                                @endif

                            </div>
                            <div class="row">
                                <div class="col-md-12 ms-auto">
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Payment Note:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                      </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Sale Note:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                      </div>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">staff Note:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                      </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    {{-- this is footer --}}

                <div class="modal-footer">
                    <button type="submit" wire:click = 'checkout({{$table}})' class="btn btn-primary">Check out Bill</button>
                </div>
            </div>
        </div>
    </div>

     <!-- change table modal  -->
     <div class="modal fade" wire:ignore.self id="table_shift_toggle" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cash_toggleLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div>
                 @if (session()->has('message'))
                     <div class="alert alert-success">
                         {{ session('message') }}
                     </div>
                 @endif
             </div>
             <div class="modal-header">
                 <h5 class="modal-title" id="cash_toggleLabel">Table Shifting </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <div class="modal-body ">
                 <div class="container-fluid">
                     <form>
                         <div class="row">
                             <div class="col-md-6 ms-auto">
                                 <div class="mb-3">

                                    <label for="Payed__by" class="form-label">Current Table</label>
                                    <select class="form-select"  aria-label="Default select example">
                                        @foreach ($tablelist as $item)
                                        @if ($item->table_id == $table)
                                        <option selected value="{{$item->table_id}}">{{$item->table_name}}</option>
                                        @endif
                                         @endforeach
                                    </select>

                                 </div>
                             </div>
                             <div class="col-md-6 ms-auto">
                                 <div class="mb-3">
                                    <label for="Payed__by" class="form-label">New Shifting Table</label>
                                    <select class="form-select" wire:model = 'shifting_table' aria-label="Default select example">
                                        <option  selected>Choose the Shifting Table</option>
                                        @foreach ($tablelist as $item)
                                                @if ($item->table_id == $table)
                                                        @continue
                                                @endif
                                            <option  value="{{$item->table_id}}">{{$item->table_name}}</option>
                                        @endforeach
                                        {{-- <option value="2">Gift Card</option>
                                        <option value="3">credit Card</option> --}}
                                    </select>

                                 </div>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-md-12 ms-auto">
                                 <div class="mb-3">
                                     <label for="message-text" class="col-form-label">Remark:</label>
                                     <textarea class="form-control" id="message-text"></textarea>
                                   </div>
                             </div>

                         </div>
                     </form>
                 </div>
             </div>
                 {{-- this is footer --}}

             <div class="modal-footer">
                 <button type="submit" wire:click = 'table_change' class="btn btn-primary">Change Table</button>
             </div>
         </div>
     </div>
 </div>
</div>
