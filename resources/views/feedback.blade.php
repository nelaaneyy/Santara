@extends('layouts.app')
@section('title', 'Mood & Love Journal')

@section('content')

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <svg class="mood-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                </svg>
                <h2 class="sidebar-title">Feedback</h2>
            </div>

            <div class="user-section">
                @if (Auth::check())
                    <div class="user-name">{{ Auth::user()->name }}</div>
                @endif
                <button type="button" class="new-journal-btn" onclick="openModalKilo()">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                    </svg>
                    Beri Masukkan
                </button>

            </div>

            {{-- <ul class="sidebar-menu">
                <li>
                    <a href="#" class="sidebar-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"
                            style="margin-right: 8px;">
                            <path
                                d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                        </svg>
                        View All Journal
                    </a>
                </li>
            </ul> --}}
        </aside>

        <!-- Main Content -->
        <main class="main-content fade-in">
            <div class="content-header">
                <h2 class="page-title">Feedback & Saran Buat Pengembang</h2>
            </div>
            @if ($feedbacks->isEmpty())
                <p>Tidak ada masukan untuk saat ini.</p>
            @else
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Isi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $index => $feedback)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-primary">{{ ucfirst($feedback->jenis) }}</span></td>
                                    <td class="text-start">{{ $feedback->isi }}</td>
                                    <td>
                                        @if ($feedback->is_read)
                                            <span class="badge bg-success">Dibaca</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Belum Dibaca</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif





        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Modal Masukkan Feedback -->
    <div class="modal" id="modalKilo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; background-color: #fff0f3; border: none;">
                <div class="modal-header"
                    style="background-color: #f8cfc5; border-bottom: none; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h5 class="modal-title" id="feedbackModalLabel" style="color: #6b3e2e; font-weight: bold;">Beri
                        Masukkan</h5>
                    <button class="btn-close" onclick="closeModal()" style="filter: brightness(0.5);"></button>
                </div>
                <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenis" class="form-label" style="color: #6b3e2e;">Jenis Masukkan</label>
                            <select name="jenis" id="jenis" class="form-select" required style="border-radius: 10px;">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="feedback">Pujian</option>
                                <option value="laporanbug">Laporan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label" style="color: #6b3e2e;">Isi Masukkan</label>
                            <textarea name="isi" id="isi" class="form-control" rows="4" placeholder="Tulis masukanmu di sini..."
                                required style="border-radius: 10px;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none;">
                        <button type="button" class="btn" data-bs-dismiss="modal"
                            style="background-color: #804040; color: white; border-radius: 6px; padding: 8px 20px;">Batal</button>
                        <button type="submit" class="btn"
                            style="background-color: #ff4fa3; color: white; border-radius: 6px; padding: 8px 20px;">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Untuk Modal Edit
            // const editModal = document.getElementById('editModal');
            // editModal.addEventListener('show.bs.modal', function (event) {
            //     const button = event.relatedTarget;
            //     const id = button.getAttribute('data-id');
            //     const activity = button.getAttribute('data-activity');
            //     const date = button.getAttribute('data-date');

            //     document.getElementById('editActivity').value = activity;
            //     document.getElementById('editDate').value = date;
            //     document.getElementById('editForm').action = `/beauty-planners/${id}`;
            // });

            // Untuk Modal Hapus
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                document.getElementById('deleteForm').action = `/journal/${id}`;
            });
        });
    </script>
    <script>
        function toggleContent(id) {
            const short = document.getElementById(`content-${id}`);
            const full = document.getElementById(`full-content-${id}`);
            const btn = document.getElementById(`toggle-btn-${id}`);

            if (full.style.display === "none") {
                full.style.display = "block";
                short.style.display = "none";
                btn.textContent = "Tutup";
            } else {
                full.style.display = "none";
                short.style.display = "block";
                btn.textContent = "Read More";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        @if (session('successs'))
            Swal.fire({
                title: 'Berhasil Dihapus🎉',
                text: 'Journal Berhasil Dihapus🙂',
                icon: 'success',
                confirmButtonText: 'Lanjut',
                background: '#fefefe',
                color: '#333',
                confirmButtonColor: '#4CAF50',
                backdrop: `rgba(0,0,0,0.5)`
            });
        @endif
        @if (session('succes'))
            Swal.fire({
                title: 'Berhasil Diperbarui🎉',
                text: 'Jadwal Berhasil Diperbarui🙂',
                icon: 'success',
                confirmButtonText: 'Lanjut',
                background: '#fefefe',
                color: '#333',
                confirmButtonColor: '#4CAF50',
                backdrop: `rgba(0,0,0,0.5)`
            });
        @endif
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil Ditambahkan 🎉',
                text: 'Journal Telah Ditambahkan 🤗',
                icon: 'success',
                confirmButtonText: 'Lanjut',
                background: '#fefefe',
                color: '#333',
                confirmButtonColor: '#4CAF50',
                backdrop: `rgba(0,0,0,0.5)`
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                title: 'Gagal Ditambahkan 😢',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                icon: 'error',
                confirmButtonText: 'Coba Lagi',
                background: '#fff0f0',
                color: '#c0392b',
                confirmButtonColor: '#e74c3c',
                backdrop: `rgba(255,0,0,0.2)`
            });
        @endif
    </script>
    <script>
        function openModalLayanan() {
            document.getElementById("modalLayanan").style.display = "block";
        }

        function openModalKilo() {
            document.getElementById("modalKilo").style.display = "block";
        }

        function openModalSatuan() {
            document.getElementById("modalSatuan").style.display = "block";
        }

        function openModalBln1() {
            document.getElementById("modalBln1").style.display = "block";
        }

        function openModalBln2() {
            document.getElementById("modalBln2").style.display = "block";
        }


        function closeModal() {
            document.getElementById("modalLayanan").style.display = "none";
            document.getElementById("modalKilo").style.display = "none";
            document.getElementById("modalSatuan").style.display = "none";
            document.getElementById("modalBln1").style.display = "none";
            document.getElementById("modalBln2").style.display = "none";
        }

        // Tutup modal jika klik di luar
        window.onclick = function(event) {
            const modalLayanan = document.getElementById("modalLayanan");
            if (event.target === modalLayanan) {
                modalLayanan.style.display = "none";
            }
            const modalKilo = document.getElementById("modalKilo");
            if (event.target === modalKilo) {
                modalKilo.style.display = "none";
            }
            const modalSatuan = document.getElementById("modalSatuan");
            if (event.target === modalSatuan) {
                modalSatuan.style.display = "none";
            }
            const modalBln1 = document.getElementById("modalBln1");
            if (event.target === modalBln1) {
                modalBln1.style.display = "none";
            }
            const modalBln2 = document.getElementById("modalBln2");
            if (event.target === modalBln2) {
                modalBln2.style.display = "none";
            }

        }
    </script>
@endsection
