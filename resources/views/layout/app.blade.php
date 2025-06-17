<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap JS (v5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="asset/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .custom-bg {
            background-color: #743A39 !important;
            background-image: none !important;
            /* Hilangkan gradient default */
        }
    </style>
    <style>
        .custom-bg {
            background-color: #743A39 !important;
            background-image: none !important;
        }

        .navbar-nav .nav-item {
            margin-bottom: 0 !important;
            /* hilangkan jarak antar item */
        }

        .navbar-nav .nav-link {
            padding-top: 6px !important;
            padding-bottom: 6px !important;
        }
    </style>

</head>

<body id="page-top" style="">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav custom-bg sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('logo1.png') }}" alt="Logo" style="max-height: 80px;">

                </div>
                {{-- <div class="sidebar-brand-text mx-3">Sally <sup>Laundry</sup></div> --}}
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('penggunaa.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('artikels.index') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Artikel</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('kategorii.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('feedback.index') }}">
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Masukkan Penguna</span>
                </a>
            </li>









        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        @yield('content')
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="asset/jquery/jquery.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>


</body>

</html>
