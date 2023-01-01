<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Pages / Blank - Admin Bootstrap Template</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="{{asset('import/assets/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/bootstrap-icons.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/boxicons.min.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/quill.snow.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/quill.bubble.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/remixicon.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/simple-datatables.css')}}" rel="stylesheet">
      <link href="{{asset('import/assets/css/style.css')}}" rel="stylesheet">
   </head>
   <body>
      <header id="header" class="header fixed-top d-flex align-items-center">
         <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="assets/img/logo.png" alt=""> <span class="d-none d-lg-block">My App</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text" name="query" placeholder="Search" title="Enter search keyword"> <button type="submit" title="Search"><i class="bi bi-search"></i></button></form>
         </div>
         <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
               {{-- <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li> --}}

               <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>Web Designer</span>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
             
                     <li> <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        Sign Out
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form></li>
                  </ul>
               </li>
            </ul>
         </nav>
      </header>
      <aside id="sidebar" class="sidebar">
         <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"> <a class="nav-link collapsed" href="{{ url('dashboard') }}
               "> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href=""> <i class="bi bi-grid"></i> <span>Units</span> </a></li>
         </ul>
      </aside>
      <main id="main" class="main">
         <div class="pagetitle">
            <h1>Blank Page</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Pages</li>
                  <li class="breadcrumb-item active">Blank</li>
               </ol>
            </nav>
         </div>
         <section class="section">
            @yield('content')
            
         </section>
      </main>
      <footer id="footer" class="footer">
        <div class="copyright"> &copy; Copyright <strong><span>Phil</span></strong>. All Rights Reserved</div>
        <div class="credits"> with love </div>
     </footer>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
       <script src="{{asset('import/assets/js/apexcharts.min.js')}}"></script>
       <script src="{{asset('import/assets/js/bootstrap.bundle.min.js')}}"></script>
       <script src="{{asset('import/assets/js/chart.min.js')}}"></script>
       <script src="{{asset('import/assets/js/echarts.min.js')}}"></script>
       <script src="{{asset('import/assets/js/quill.min.js')}}"></script>
       <script src="{{asset('import/assets/js/simple-datatables.js')}}"></script>
       <script src="{{asset('import/assets/js/tinymce.min.js')}}"></script>
       <script src="{{asset('import/assets/js/validate.js')}}"></script>
       <script src="{{asset('import/assets/js/main.js')}}"></script> 
            
  </body>
</html>