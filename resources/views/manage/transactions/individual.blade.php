@extends('layouts.manage')
@section('title', 'Item')

@section('content')
    <!-- DATA TABLE-->
        <section class="p-t-20">
            <div class="container">                
                        <div class="row">
                                <div class="col-lg-6">
                                    <!-- USER DATA-->
                                    <div class="user-data">
                                        <h3 class="title-3 m-b-30">
                                            <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                            <form class="form-inline"></form>
                                            <div class="filters m-b-30">
                                                    <div class="form-inline">
                                                            <select name="customer_id" style="width:48%;" class="customer form-control " id="">
                                                            </select>
                                                            <input type="hidden" name="service_category_value" value="">
                                                            <select name="service_category_id" style="width:49%;" class="form-control " id="service_category_id">
                                                                    <option value="">Select Service Type</option>
                                                                @foreach(\App\Models\ServiceCategory::orderBy('id', 'ASC')->get() as $category )                                                                
                                                                    <option value="{{$category->id}}">{{$category->name}} | ({{$category->hours}} Hrs)</option>
                                                                
                                                                @endforeach

                                                            </select>                                                                                                                                                                                                                          
                                                        </div>   

                                                  
                                                </div>
                                                <h3 class="title-3 m-b-30">
                                                        <i class="zmdi zmdi-shopping-basket"></i>Drop Offs</h3>
                                        <div class="filters m-b-45">
                                                
                                                        <select name="item_category_id" class="form-control mb-2 mr-2 mr-sm-2" id="item_category_id">
                                                                <option selected="selected">Category</option>
                                                                @foreach(\App\Models\ItemCategory::orderBy('name', 'ASC')->get() as $category )                                                                
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                        <select name="item_id" class="form-control mb-2 mr-2 mr-sm-2" id="item_id">
                                                                <option value="">Item</option>                                                                
                                                        </select>                                                                                                                                                                                                                          
                                                        <input type="number" style="width:5em;" name="qty" id="qty" class="form-control  mb-2 mr-2 mr-sm-2" value="1">           
                                                        <input type="number" style="width:7.5rem;" name="price" id="price" class="form-control  mb-2 mr-2 mr-sm-2" value="0" readonly>                                                                                                                                                                                                                              
                                                        <input type="number" name="amount" id="amount" class="form-control  mb-2 mr-2 mr-sm-2" readonly>                                                                                                                                                                      
                                                        <textarea name="note" class="form-control" id="note" cols="30" rows="3"></textarea>
                                                        <a href="#" onclick="addToBasket()" class="btn btn-default mb-2" style="border:1px dotted #000;"> <i class="zmdi zmdi-mail-send text-success"></i> </a>

                                                        <button class="btn btn-success mt-5 btn-block" onclick="postData()">Submit All</button>
                                                                                                 
                                        </div>
                                    </form>   
                                        
                                    </div>
                                    <!-- END USER DATA-->
                                </div>
                                <div class="col-lg-6">
                                    <!-- TOP CAMPAIGN-->
                                    <div class="top-campaign">
                                        <h3 class="title-3 m-b-30">Dropped Off</h3>
                                        <div class="table-responsive">

                                            <table class="table table-top-campaign" id="basketTable" >
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
                                        </div>
                                    </div>
                                    <!--  END TOP CAMPAIGN-->
                                </div>
                            </div>                        
                            
                  
                </div>
            </div>
        </section>
    <!-- END DATA TABLE-->
@stop

@section('scripts')
<script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript">
    
    $('input[name="qty"]').on('keyup', function(){        
        var qty = $(this).val();
        var price = $('input[name="price"]').val();
        $('input[name="amount"]').val(qty*price); 
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
            results:  $.map(data, function (item) {
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

    $('select[name="service_category_id"]').on('change', function() {
        var sc = $(this).val(); 
        //var scat_id = $("#service_category_id option:selected").val(); 
        $('input[name="service_category_value"]').val(sc);
        $(this).prop('disabled', 'disabled');

    });

    $('select[name="item_category_id"]').on('change', function() {
        var icat_id = $(this).val(); 
        var scat_id = $("#service_category_id option:selected").val(); 
        
        $.ajax({
            url: '/items/getByCategory/' + icat_id + '/'+ scat_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
            $('#item_id').empty();            
            $('#item_id').append('<option value = ""> Select Item </option>');                
            for (var i = 0; i < data.length; i++) {
                $('#item_id').append('<option value = ' + data[i].id + '>' + data[i].name + '</option>');                
            }
        }
        })
    });

    $('select[name="item_id"]').on('change', function() {
        
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
    function addToBasket(){
        
        var amt = $('input[name="amount"]').val();
        var qty = $('input[name="qty"]').val();
        var prc = $('input[name="price"]').val();
        var srv_cat = $('input[name="service_category_value"]').val();
        var item = $('#item_id').val();    
        var note = $('input[name="note"]').val();
        var item_name = $('#item_id option:selected').text();
        
        if (amt > 0 && qty > 0 && prc > 0 && srv_cat != null){

            collections.push({item_id: item, item_name: item_name, service_category_id: srv_cat, quantity: qty, amount: amt, note: note  });            
    
        $('#basketTable tr:last').after('<tr><td>'+item_name+'</td><td>'+amt / qty +'</td><td>'+qty+'</td><td>'+amt+'</td></tr>');
         
        }else{
            alert ('Alert!!\nPlease ensure that all input are filled correctly and completely');
        }


    }

    function postData(){
        console.log(collections);

     /*      $.ajax({
            url: '/items/getById/' + item_id,
            type: "POST",
            dataType: "json",
            success: function (data) {                            
                $('input[name="price"]').val(data);                        
        }
        }); */
    }








</script>
@endsection
