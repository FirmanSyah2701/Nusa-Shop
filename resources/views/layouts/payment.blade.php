<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload bukti pembayaran</title>
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
            <div class="card">
            <div class="card-header">Checkout</div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    Upload bukti pembayaran:
                    <input type="file" name="photo" style="margin-left:15px;">
                    <div style="margin-top:20px;">
                        <a href="{{url('contact')}}" class="btn btn-sm btn-main">Simpan</a>
                    </div>
                </form>
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