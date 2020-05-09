<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Checkout</title>
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
                <form action="{{ url('api/ongkos') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Kurir</label>
                        <div class="col-sm-8">
                            <select name="" class="form-control" size="1">
                                 
                            </select>
                        </div>
                    </div>
                    <button type="submit">Cek ongkos</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>