<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Keranjang</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{url('asstes/plugins/jquery-ui/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/slick-carousel/slick/slick-theme.css')}}">
  <link rel="stylesheet" href="{{url('plugins/fancybox/jquery.fancybox.pack.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/jquery-nice-select/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{url('assets/plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
</head>
<body>
<div class="container">
    <div style="margin-top:35px;">
        <div class="col-md-12 offset-md-1 col-lg-12 offset-lg-0">
            <div class="widget dashboard-container my-adslist">
                <h3 class="widget-header">Keranjang</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Foto barang</th>
                            <th class="text-center">Nama barang</th>
                            <th>Jumlah barang yang dibeli</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td class="product-thumb">
                                    <img class="hvr-pulse img-responsive" 
                                        src="{{url('/assets/img/product/', $data->product->photo)}}" 
                                        style="width: 120px;">
                                </td>
                                <td class="product-details">
                                    <h4 class="title" style="margin-left:140px;">{{ $data->product->product_name }}</h4>
                                </td>
                                <td class="product-category">
                                    <input type="number" value="{{ $data->qty }}" readonly>
                                </td>
                                <td class="action" data-title="Action">
                                    <form action="{{route('deleteItem', $data->cart_id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach     
                    </tbody>
                </table>
                <p style="color: black"> Sub total:  @currency($subTotal)  <p>
                
                <form action="{{ route('showCheckout')}}" method="get">
                    @if(count($datas) > 0)
                        <button class="btn btn-main">Checkout</button>
                    @endif
                    <a style="color: #ffff;" class="btn btn-danger" href="/">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{url('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{url('assets/plugins/tether/js/tether.min.js')}}"></script>
    <script src="{{url('assets/plugins/raty/jquery.raty-fa.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap/dist/js/popper.min.js')}}"></script>
    <script src="{{url('assets/plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>
    <script src="{{url('assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{url('assets/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{url('assets/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
    <script src="{{url('assets/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
    <script src="{{url('assets/js/scripts.js')}}"></script>
  
</body>
</html>
