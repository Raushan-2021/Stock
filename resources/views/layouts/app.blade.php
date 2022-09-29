<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RNI Stock Management</title>
    <link rel="icon" type="image/gif/png" href="../assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
   
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">

     <style>
         .login-page {
             height: 100vh;
             display: grid;
             grid-template-rows: auto 1fr auto;
         }

         .login-page .main-content {
             display: grid;
             place-items: center;
         }
         
         .login-page .main-content .card {
             box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
         }
     </style>
</head>
<body>
    <div class="login-page">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-1 ">
            <a class="navbar-brand text-white" href="/">
                <div class="d-flex align-items-center">
                    <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-fluid mr-2" width="84">
                    <div class="text-white d-none d-md-block">
                        <h6 class="mb-0">Canteen of Ministry of New and Renewable Energy</h6>
                        <p class="mb-0 lead text-white">Ministry of New &amp;  Renewable Energy</p>
                        <p class="mb-0 text-white" style="line-height: 1"> <small>Government of India</small></p>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ml-auto">
                  @if (!request()->is('/'))
                  <li class="nav-item">
                      <a class="nav-link text-white text-center text-lg-left" href="/logout">Logout</a>
                  </li>
                   @endif
                    
                </ul>
            </div>
        </nav>
        
        <main class="main-content">
            @yield('content')
        </main>
    
        {{-- footer --}}
        <footer>
            <div class="container-fluid footerWrap pt-1">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6 text-white">                              
                                   © Content is owned by <a href="http://rni.nic.in/" title="Home" class="text-white text-left">Registrar Of Newspapers for India </a> 
                        </div>
                     
    
    
                        <div class="col-md-6 col-sm-12 col-xs-6">
                             <a href="Title.aspx" title="Home" class="text-white text-right" style="float:right">The Portal is designed, developed and hosted by
                                <img src="{{asset('assets/images/NIC-logo.png')}}" width="60"></a> 
                        </div>
                    </div>
    
                </div>
            </div>
        </footer>
        {{-- End footer --}}
    </div>
</body>
</html>
