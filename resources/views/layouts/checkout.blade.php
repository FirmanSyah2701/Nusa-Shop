<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Checkout</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{url('asstes/plugins/jquery-ui/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/fancybox/jquery.fancybox.pack.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/jquery-nice-select/css/nice-select.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css">
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
</head>
<body>
    <div class="container">
        <div style="margin-top:35px;">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    <form action="/checkout" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Atas Nama: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer_name" 
                                    name="customer_name" placeholder="Masukkan Nama Anda">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Kota Anda: </label>
                            <div class="col-sm-8">
                                <select type="text" id="destination" name="destination">
                                    @foreach ($city as $data)
                                        <option value="{{ $data->city_id }}">
                                            {{ $data->type }} - {{ $data->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Alamat lengkap: </label>
                            <div class="col-sm-8">
                                <textarea name="full_address" id="full_address" 
                                    cols="72" rows="10" placeholder="Isi Alamat lengkap anda">
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Weight: </label>
                            <div class="col-sm-8">
                                @foreach ($products as $product)
                                    <input type="text" id="weight" name="weight" value="{{ $product->weight * $q }}">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Kurir: </label>
                            <div class="col-sm-8">
                                <select name="courier" id="courier" class="form-control">
                                    <option value="" selected>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="jnt">JNT</option>         
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
                        {{-- Harga pengiriman: <p>
                        @foreach ($products as $product)
                            Subtotal barang: {{ $q * $product->price }}<p>
                        @endforeach
                        Total Harga:  <p> --}}
                        <button class="btn btn-main" type="submit">Pesan Sekarang</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
    <script>
        $('select[name="courier"]').on('change', function(){
            let destination = $("select[name=destination]").val();
            let courier     = $("select[name=courier]").val();
            let weight      = $("input[name=weight]").val();

            if(courier){
                jQuery.ajax({
                    url: "/destination=" + destination + "&weight=" + weight + "&courier=" + courier,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'GET',
                    dataType: 'json',
                    success:function(data){
                        $('select[name="layanan"]').empty();
                        $.each(data, function(key, value){
                            $.each(value.costs, function(key1, value1){
                                $.each(value1.cost, function(key2, value2){
                                    $('select[name="layanan"]').append('<option value="' + key + '">' +
                                        value1.service + '-' + 
                                        value1.description + '-' +
                                        value2.value + '</option>');
                                });
                            });
                        });
                    }
                });
            }
        });

    </script>
</body>
</html>