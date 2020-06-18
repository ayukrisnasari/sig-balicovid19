<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap-social.css">
    <link rel="stylesheet" href="http://leaflet.github.io/Leaflet.label/leaflet.label.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
    <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
</head>


<style>
    html,
    body,
    #map {
        height: 400px;
        width: 100%;
        padding: 0;
        margin: 0;
    }
    @font-face {
            font-family: sans-serif;
            src: url('/fonts/ProximaNova-Regular.woff');
        }
    .gradient-header-big {
            color: white;
            width: 100%;
            background: linear-gradient(90deg, rgba(176,24,49,1) 0%, rgba(242,57,57,1) 35%, rgba(255,255,255,1) 100%);
        }
        
</style>

<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ml-5" href="/">
      <img src="https://4.bp.blogspot.com/-ELlrLdH0frM/WSz4AjqIWaI/AAAAAAAAASY/EF5ayA5zXn05TXw53cRUVTJeh6lzUJDDwCLcB/s400/Lambang%2BDaerah%2BProvinsi%2BBali%2B2.png" width="30" height="30" class="d-inline-block align-top" alt="">
  
    </a>
    
    <div class="collapse navbar-collapse" style="padding-left:50px;padding-right:50px;" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="/data-kabupaten">Kelola Data</a>
			</li>
			
		</ul>
	</div>
</nav>
<div class="container-fluid p-0">
        <div class="gradient-header-big">
            <div class="row m-0" style="">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center" style="padding-bottom:100px;">
                    <div class="row justify-content-center">
                            <h1 style="padding-top:100px;">
                                <span class="py-3" id="text-beranda">
                                    PROVINSI BALI TANGGAP COVID-19   <br>    Per tanggal <strong> {{$tanggalSekarang}}      </strong>                  </span>
                            </h1>                          
                    </div>
                    
                </div>
                <div class="col-md-2"></div>                    
            </div>
        </div>
    </div>


<body class="hold-transition sidebar-mini">
   
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    {{-- <router-view></router-view> --}}
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
               1705551046 | Ni Komang Ayu Krisnasari
            </div>
            <!-- Default to the left -->
            
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    
    <script src="/js/app.js"></script>
    @yield('js')
</body>

</html>