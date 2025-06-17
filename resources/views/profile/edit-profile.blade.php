@extends('layouts.app')
@section('title', 'Edit Profile') {{-- Title for the editing page --}}

@section('content')
    <div class="profile-page-container"> {{-- Reusing class names from previous turn --}}
        <div class="profile-content-wrapper">
            <div class="profile-header">
                <h2>Edit Profile</h2> {{-- Title for the editing form --}}
            </div>

            <form class="profile-form" action="{{ route('profile.edit') }}" method="POST">
                @csrf {{-- Laravel CSRF token --}}

                <div class="profile-picture-section">
                    <div class="profile-image-placeholder">
                        <img src="{{ asset('images/photos/Userprofil.png') }}" alt="User Profile">
                        <button type="button" class="camera-icon-overlay">
                            <img src="{{ asset('images/icons/camera.png') }}" alt="Change Profile Picture">
                        </button>
                    </div>
                </div>

                <div class="profile-fields">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <p class="separator">:</p>
                        <input type="text" id="name" name="name"
                            value="{{ Auth::user()->name ?? 'selvi.ayueeee' }}">
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <p class="separator">:</p>
                        <input type="email" id="email" name="email"
                            value="{{ Auth::user()->email ?? 'selvi@example.com' }}">
                    </div>

                    <div class="form-group">
                        <label for="current_password">Password Lama</label>
                        <p class="separator">:</p>

                        <input type="password" id="current_password" name="current_password"
                            placeholder="Masukkan password lama">
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <p class="separator">:</p>

                        <input type="password" id="password" name="password" placeholder="Masukkan password baru">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi</label>
                        <p class="separator">:</p>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Ulangi password baru">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="save-button">SAVE</button>
                        <button type="button" class="cancel-button"
                            onclick="window.location='{{ route('profile') }}'">CANCEL</button>
                    </div>
                </div>



            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Profil Berhasil Diperbarui 🎉',
                text: '{{ session('success') }}',
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
                title: 'Profil Gagal Diperbarui 😢',
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
