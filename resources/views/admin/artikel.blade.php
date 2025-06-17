@extends('layout.app')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand  navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @auth
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            @endauth

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div> --}}

                            <button class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                                </a>

                        </div>
                    </li>

                </ul>

            </nav>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>

                </div>

                <!-- Welcome Card -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Selamat Datang, Admin Santara!</h5>
                        <p class="card-text">
                            Selamat datang di dashboard Santara. Melalui halaman ini, Anda dapat mengelola seluruh
                            operasional Santara dengan mudah dan efisien. Termasuk di dalamnya pengelolaan data pengguna,
                            artikel, kategori, serta masukan dari pengguna.
                        </p>

                    </div>
                </div>

                <!-- Manajemen Konten -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Manajemen Konten Artikel</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Publikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artikels as $artikel)
                                    <tr>
                                        <td>
                                            @if ($artikel->foto)
                                                <img src="{{ asset('storage/' . $artikel->foto) }}" alt="Foto Artikel"
                                                    style="max-width: 100px; border-radius: 5px;">
                                            @else
                                                <span class="text-muted">Tidak ada foto</span>
                                            @endif
                                        </td>
                                        <td>{{ $artikel->judul }}</td>
                                        <td>{{ $artikel->kategori->nama_kategori ?? '-' }}</td>
                                        <td>{{ $artikel->nama_pembuat }}</td>
                                        <td>{{ \Carbon\Carbon::parse($artikel->created_at)->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Tombol Tambah Artikel -->
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahArtikelModal">
                            + Tambah Artikel
                        </button>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- Begin Page Content -->

    <!-- Bootstrap core JavaScript-->

    <!-- Logout Modal-->
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Tambah Artikel -->
    <!-- Modal Tambah Artikel -->
    <div class="modal fade" id="tambahArtikelModal" tabindex="-1" role="dialog" aria-labelledby="tambahArtikelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahArtikelLabel">Tambah Artikel Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Isi</label>
                            <textarea name="isi" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Nama Pembuat</label>
                            <input type="text" name="nama_pembuat" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto Artikel (opsional)</label>
                            <input type="file" name="foto" class="form-control-file" accept="image/*">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
