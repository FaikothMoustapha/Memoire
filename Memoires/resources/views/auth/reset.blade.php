<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | JoFa</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{asset('../assets/favicon.ico')}}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('../assets/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('../assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('../assets/node_modules/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('../assets/node_modules/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="{{asset('../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('../assets/dist/css/theme.min.css')}}">
        <script src="{{asset('../assets/src/js/vendor/jquery-3.3.1.min.js')}}"></script>
        </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('../img/auth/reset.jpg')">
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="../index.html"><img src="../src/img/brand.svg" alt=""></a>
                            </div>
                            <h3>Connectez-vous à votre compte</h3>
                            <p>Heureux de vous revoir</p>
                            <div >
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                    
                                @endif
                                    
                            </div>
                            <form action="{{ route('password_reset', ['token' => $token]) }}"  method="post">
                                @csrf
                               
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="mot de passe" required="" name="password">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="confirmer le mot de passe" required="" name="confirm_password">
                                    <i class="ik ik-eye-off"></i>
                                </div>
                               
                                <div class="sign-btn text-center">
                                    <button class="btn btn-space btn-primary">Envoyer</button>
                                </div>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('../assets/src/js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
        <script src="{{asset('../assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('../assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src=" {{asset('../assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('../assets/node_modules/screenfull/dist/screenfull.js')}}"></script>
        <script src="{{asset('../assets/dist/js/theme.js')}}"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
