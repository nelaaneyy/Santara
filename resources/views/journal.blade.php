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
                <h2 class="sidebar-title">Mood & Love Journal</h2>
            </div>

            <div class="user-section">
                <div class="user-name">Selvi.Ayueeee_'s Journey</div>
                <a href="{{ route('menulis-journal.menulis') }}" class="new-journal-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                    </svg>
                    New Journal
                </a>
            </div>

            <ul class="sidebar-menu">
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
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content fade-in">
            <div class="content-header">
                <h2 class="page-title">Mood & Love Journal</h2>
            </div>

            <div class="journal-entry">
                @foreach ($journal as $entry)
                    <div class="entry-item">
                        <h3 class="entry-title">{{ $entry->judul }}</h3>
                        <div class="entry-content" id="content-{{ $entry->id }}">
                            {{ \Illuminate\Support\Str::words($entry->isi, 20, '...') }}
                        </div>

                        {{-- Full content hidden initially --}}
                        <div class="entry-full-content" id="full-content-{{ $entry->id }}" style="display: none;">
                            {{ $entry->isi }}
                        </div>

                        <div class="entry-meta">
                            <span
                                class="entry-date">{{ \Carbon\Carbon::parse($entry->created_at)->format('M d, Y') }}</span>
                            <div class="entry-actions">
                                <button class="btn btn-edit" onclick="toggleContent({{ $entry->id }})"
                                    id="toggle-btn-{{ $entry->id }}">
                                    Read More
                                </button>
                                <button class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-id="{{ $entry->id }}">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6 19c0 1.1.9 2 2
                                                2h8c1.1 0 2-.9 2-2V7H6v12zM19
                                                4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Modal Delete -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
                            <div class="modal-header" style="background-color: #f7cfc1; border-bottom: none;">
                                <h5 class="modal-title" id="deleteModalLabel" style="color: #7d4b44; font-weight: bold;">
                                    Konfirmasi Hapus
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body" style="background-color: #fff4f6; color: #7d4b44;">
                                Apakah kamu yakin ingin menghapus Journal ini?
                            </div>
                            <div class="modal-footer" style="background-color: #fff4f6; border-top: none;">
                                <button type="button" class="btn" data-bs-dismiss="modal"
                                    style="background-color: #7d4b44; color: white;">
                                    Batal
                                </button>
                                <button type="submit" class="btn" style="background-color: #f85ca7; color: white;">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
@endsection
