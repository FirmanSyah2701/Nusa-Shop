<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Checkout</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/jquery-nice-select/css/nice-select.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css">
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach  
            </ul>  
        </div> 
    @endif
    <div class="container">
        <div style="margin-top:35px;">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    <form action="{{route('checkoutPost')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Nama: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer_name" 
                                    name="customer_name" placeholder="Masukkan Nama Anda" 
                                    value="{{ $customer->name }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Kota Anda: </label>
                            <div class="col-sm-8">
                                <select type="text" id="destination" name="destination">
                                    <option value="">Pilih Kota Tujuan</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city_id }}">
                                            {{ $city->type }} - {{ $city->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Alamat lengkap: </label>
                            <div class="col-sm-8">
                                <textarea name="full_address" class="form-control" id="full_address"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Nomer telpon: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="number_phone" 
                                    value="{{ $customer->number_phone }}">     
                                @foreach ($datas as $data)
                                    <input type="hidden" id="weight" name="weight" 
                                        value="{{ $data->qty * $data->weight }}">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Kurir: </label>
                            <div class="col-sm-8">
                                <select name="courier" id="courier" class="form-control">
                                    <option value="" selected>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option class="pointer-disabled" value="jnt" disabled>
                                        J&T
                                    </option>         
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Layanan: </label>
                            <div class="col-sm-8">
                                <select name="layanan" id="layanan" class="form-control">
                                    <option value="">Pilih Layanan</option>         
                                </select>
                            </div>
                        </div>
                        
                        <div id="detailPrice">
                            <p> Harga pengiriman: <span id="cost"> </span> </p>
                            
                            <p> Subtotal barang: @currency($subTotal) </p>
                                <input type="hidden" id="subtotal" value="{{ $subTotal }}">
                            <p> Total Harga: <span id="total">  </span> </p>
                            <input type="hidden" name="etd">
                            <input type="hidden" name="customer_id" value="{{ session('customer_id') }}">
                            <input type="hidden" name="total_price" id="total_price">
                            <input type="hidden" name="city_id" id="city">
                            <input type="hidden" name="service" id="service">
                            <p> Estimasi Barang Sampai: <span id="etd"> </span> </p>  
                            <p> Transfer ke no rek BRI Atas Nama Nur Azizah: 016501068096500 </p> 
                        </div> 
                        
                        <button class="btn btn-main" type="submit">Pesan Sekarang</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
    <script src="{{url('assets/js/simple.money.format.js')}}"></script>
    <script>
        $('#destination').selectize({
            labelField: 'name',
            searchField: ['name'],
            placeholder: "Pilih Kota Tujuan",
            delimiter: ","
        });

        $('select[name="destination"]').on('change', function(){
            let city = $("select[name=destination]").val();
            $('#city').val(city);
        });

        $('select[name="courier"]').on('change', function(){
            let destination = $("select[name=destination]").val();
            let courier     = $("select[name=courier]").val();
            let weight      = $("input[name=weight]").val();

            if(courier){
                $.ajax({
                    url: "/destination=" + destination + "&weight=" + weight + "&courier=" + courier,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        const results = data.results;
                        if(results){
                            $('select[name="layanan"]').empty();
                            $('select[name="layanan"]').append(`<option 
                                value=''> Pilih Layanan </option>`);
                            results[0].costs.forEach(cost =>{
                                $('#layanan').append(`<option 
                                    value='${cost.cost[0].value}'> 
                                    ${cost.service} - ${cost.cost[0].value}
                                    </option>`) 
                                $('select[name="layanan"]').on('change', function(){
                                    let service = $('select[name="layanan"]').val(); 
                                    $('#cost').html(service).simpleMoneyFormat();
                                    if(service == cost.cost[0].value){
                                        var subTotal = parseInt($('#subtotal').val());
                                        var total = cost.cost[0].value + subTotal;
                                        $('#service').val(cost.service);
                                        $('#total').html(total);
                                        $('#total_price').val(total);
                                        $('#etd').html(cost.cost[0].etd);
                                        $("input[name=etd]").val(cost.cost[0].etd)
                                    }
                                });
                            });
                        }             
                    }
                });
            }
        });
    </script>
</body>
</html>