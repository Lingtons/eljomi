@extends('layouts.manage') @section('title', 'Item') @section('content')
<!-- DATA TABLE-->
<section class="p-t-20">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6">                
                <!-- USER DATA-->
                <div class="user-data m-b-30">
                    <h3 class="title-3 m-b-30">
                        <i class="zmdi zmdi-account-calendar"></i>user data
                        <small class="float-right">
                            <a href="{{Request::url()}}" class="text-dark">
                                <i class="fa fa-refresh"></i> Reset</a>
                        </small>
                    </h3>
                   
                    <div class="filters m-b-30">
                       
                            <div class="row">
                                <div class="col-6">
                                    <select name="customer_id" style="width:100%;" class="customer form-control " id="" required>
                                    </select>
                                    <input type="hidden" name="service_category_value" value="">
                                </div>
                                <div class="col-6">
                                    <select name="service_category_id" style="width:100%;" class="form-control " id="service_category_id" required> 
                                        <option value="">Select Service Type</option>
                                        @foreach(\App\Models\ServiceCategory::orderBy('id', 'ASC')->get() as $category )
                                        <option value="{{$category->id}}">{{$category->name}} | ({{$category->hours}} Hrs)</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                    </div>
                    <h3 class="title-3 m-b-30">
                        <i class="zmdi zmdi-shopping-basket"></i>Collection</h3>
                    <div class="filters m-b-45">
                        <div class="row">
                            <div class="col-6">
                                <select name="item_category_id" class="form-control mb-2 mr-2 mr-sm-2" id="item_category_id" required>
                                    <option selected="selected">Category</option>
                                    @foreach(\App\Models\ItemCategory::orderBy('name', 'ASC')->get() as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="item_id" class="form-control mb-2 mr-2 mr-sm-2" id="item_id" required>
                                    <option value="">Item</option>
                                </select>
                            </div>
                            <div class="col-4">
                                    <input type="number"  name="qty" id="qty" class="form-control  mb-2 mr-2 mr-sm-2" value="1">
                                   
                            </div>
                            <div class="col-4">
                                    <input type="number"  name="price" id="price" class="form-control  mb-2 mr-2 mr-sm-2"  >
                                   
                            </div>
                            <div class="col-4">
                                    <input type="number" name="amount" id="amount" class="form-control  mb-2 mr-2 mr-sm-2" readonly>
                            </div>
                        </div>                       
                        <input  type = 'text' name="note" class="form-control mb-3" id="note" placeholder="Add a Note">
                        <a href="#" onclick="addToBasket()" class="btn btn-default text-dark btn-block mb-2" style="border:1px dotted #000;">
                            Add to Collection <i class="zmdi zmdi-mail-send text-success"></i>
                        </a>                    
                    </div>
                    </form>

                </div>
                <!-- END USER DATA-->
            </div>
            <div class="col-lg-6">
                <!-- TOP CAMPAIGN-->
                <div class="top-campaign m-b-30">
                    <h3 class="title-3 m-b-30">
                        <i class="zmdi zmdi-shopping-basket"></i> Collection
                        <small class="float-right">
                            <a href="{{Request::url()}}" class="text-dark">
                                <i class="fa fa-refresh"></i> Reset</a>
                        </small>
                    </h3>
                    <div class="table-responsive">

                        <table class="table table-top-campaign" id="basketTable">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button class="btn btn-success mt-5 btn-block" id="submitAll">Submit Collection</button>
                    </div>
                </div>
                <!--  END TOP CAMPAIGN-->
            </div>
        </div>
    </div>
    </div>
</section>
<!-- END DATA TABLE-->
@stop @section('scripts')
<script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript">
    $('input[name="qty"]').on('keyup', function () {
        var qty = $(this).val();
        var price = $('input[name="price"]').val();
        $('input[name="amount"]').val(qty * price);
        //console.log(res);
    });

    $('.customer').select2({
        theme: 'bootstrap4',
        placeholder: 'Select a Client',
        ajax: {
            url: '/customers/search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('select[name="service_category_id"]').on('change', function () {
        var sc = $(this).val();
        //var scat_id = $("#service_category_id option:selected").val(); 
        $('input[name="service_category_value"]').val(sc);
        $(this).prop('disabled', 'disabled');
    });

    $('select[name="item_category_id"]').on('change', function () {
        var icat_id = $(this).val();
        var scat_id = $("#service_category_id option:selected").val();

        $.ajax({
            url: '/items/getByCategory/' + icat_id + '/' + scat_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('#item_id').empty();
                $('#item_id').append('<option value = ""> Select Item </option>');
                for (var i = 0; i < data.length; i++) {
                    $('#item_id').append('<option value = ' + data[i].id + '>' + data[i].name +
                        '</option>');
                }
            }
        })
    });
    
    $('input[name="price"]').on('keyup', function(){
        var price = $(this).val();
        var qty = $('input[name="qty"]').val();
        $('input[name="amount"]').val(qty * price);

    });

    $('select[name="item_id"]').on('change', function () {

        var item_id = $(this).val();
        $('input[name="price"]').val("");
        $('input[name="qty"]').val("");
        $('input[name="amount"]').val("");


        $.ajax({
            url: '/items/getById/' + item_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('input[name="price"]').val(data);
            }
        })
    });

    var collections = [];
    var total = 0;

    function addToBasket() {

        var amt = $('input[name="amount"]').val();
        var qty = $('input[name="qty"]').val();
        var prc = $('input[name="price"]').val();
        var srv_cat = $('input[name="service_category_value"]').val();
        var item = $('#item_id').val();
        var note = $('input[name="note"]').val();
        var item_name = $('#item_id option:selected').text();

        if (item != null && amt > 0 && qty > 0 && prc > 0 && srv_cat != null) {

            collections.push({
                item_id: item,
                item_name: item_name,
                service_category_id: srv_cat,
                quantity: qty,
                amount: amt,
                note: note
            });
            total += parseInt(amt);


            $('#basketTable tr:last').after('<tr><td>' + item_name + '</td><td>' + amt / qty + '</td><td>' + qty +
                '</td><td>' + amt + '</td></tr>');

        } else {
            alert('Alert!!\nPlease ensure that all input are filled correctly and completely');
        }
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#submitAll").click(function (e) {
        e.preventDefault()

        var service_category_id = $('select[name="service_category_id"]').val();
        var customer_id = $('select[name="customer_id"]').val();

        if ((customer_id != null) || (collections.length < 1) || (amt == 0)) {
            $.ajax({
                url: '/transactions/new',
                type: "POST",
                dataType: "json",
                data: {
                    customer_id: customer_id,
                    service_category_id: service_category_id,
                    total: total,
                    short_note: 'Corporate Transaction',
                    collections: JSON.stringify(collections)
                },
                success: function (data) {
                    //alert(data.success);
                    if(data.transactionId != null){
                        collections = [];
                    amt = 0;
                    $('input[name="amount"]').val("");
                    $('input[name="qty"]').val("");
                    $('input[name="price"]').val("");
                    $('input[name="service_category_value"]').val("");
                    $('#item_id').val("");
                    $('input[name="note"]').val("");

                    //location.reload();
                    location.href = "/manage/transactions/"+data.transactionId;
       
                    }
                     

                }
            });

        } else {
            alert('Please complete all information before posting !');
        }


    });
</script>
@endsection