<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Login</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style>
    .well
      {
         padding: 35px;
         padding-left: 30px;
         box-shadow: 0 0 50px #666666;
         margin: 7% auto 0;
         width: 450px;
         background: rgba(0.4, 0, 0, 0.4);
      }

      .btn1
      {
         margin-right:10px;
         background-color: #FF3838;
         color: white;
         transition: all 0.5s;
      }
      .btn1:hover, .btn1:focus
      {
         background-color: white;
         color: black;
         border: 1px solid;
         border-color: #FF3838;
         transition: 0.5s;
      }
      a:hover
      {
         text-decoration: none;
         color: red;
      }

      .well-header
      {
         background-color: #FF3838;
      }

      .input-group-addon
      {
          background-color: #FF3838;
          border-color: #FF3838;
          color: white;
      }

      .btn2
      {
         background-color: #3a51ff;
         color: white;
         transition: all 0.5s;
      }
      .btn2:hover, .btn2:focus
      {
         background-color: white;
         color: black;
         border: 1px solid;
         border-color: #3a51ff;
         transition: 0.5s;
      }
      </style>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body style="background: url({{url('assets/img/a.jpg')}}) no-repeat center center fixed;">                            
    <div class="container-fluid">
        <div class="row">
            <div class="well center-block">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <form action="#" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" placeholder="Username" id="nim" name="nim" class="form-control">
                                        <div class="input-group-btn">
                                            <button type="button" id="remove" data-val="1" class="btn btn-default btn-md"> <span class="glyphicon glyphicon-remove"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </div>
                                        <input type="password" class="form-control pwd" name="password" id="password" placeholder="Password">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                        </span>          
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <input type="checkbox" name="check"> Remember Me
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" name="btnSubmit" class="btn btn-lg btn1 btn-block"> Login</button> 
                    </div>
                    </form>
                    <div style="margin-left:15px; ">
                        Belum punya akun klik &nbsp; <a style="color:white;" href="">daftar</a>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
   <script type='text/javascript'>
      $(".reveal").on('click',function() {
       var $pwd = $(".pwd");
      if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
      } else {
        $pwd.attr('type', 'password');
      }
      });   
      /*/$(document).ready(function() 
      {
         $("#showhide").click(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#pwd").prop('type','text');
               $("#eye").attr("class","glyphicon glyphicon-eye-close");
               $(this).data('val','0');
            }
            else
            {
               $("#pwd").prop('type', 'password');
               $("#eye").attr("class","glyphicon glyphicon-eye-open");
               $(this).data('val','1');
            }
         });
      });
      */
    $(document).ready(function()

          {
             $("#remove").click(function()
             {
               $("#uname").val('');
             });
             
          });
</script>
</body>
</html>