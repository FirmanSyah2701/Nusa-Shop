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
                            <th>Image</th>
                            <th class="text-center">Product</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-thumb">
                                <img width="80px" height="auto" src="images/products/products-1.jpg" alt="image description"></td>
                            <td class="product-details">
                                <h3 class="title" style="margin-left:170px;">Macbook Pro 15inch</h3>
                            </td>
                            <td class="product-category"><span class="categories">Laptops</span></td>
                            <td class="action" data-title="Action">
                                <input type="checkbox" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <td class="product-thumb">
                                <img width="80px" height="auto" src="images/products/products-1.jpg" alt="image description"></td>
                            <td class="product-details">
                                <h3 class="title" style="margin-left:170px;">Macbook Pro 15inch</h3>
                            </td>
                            <td class="product-category"><span class="categories">Laptops</span></td>
                            <td class="action" data-title="Action">
                                <input type="checkbox" name="" id="">
                            </td>
                        </tr>
                    </tbody>
                </table>
                Sub total: <p>
                <a href="{{url('checkout')}}" class="btn btn-main">Checkout</a>
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
