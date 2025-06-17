@extends('layouts.app')
@section('title', 'Profile') {{-- This page is now the main 'Profile' view --}}

@section('content')
<div class="profile-view-container"> {{-- Changed class name to distinguish from edit form --}}
    <div class="profile-view-wrapper"> {{-- Changed class name for specific view styling --}}

        {{-- Profile Picture Section for View Page (Matching image_acf772.png) --}}
        <div class="profile-display-picture"> {{-- New class name for view's picture section --}}
            <img src="{{ asset('images/photos/Userprofil.png') }}" alt="User Profile">
            {{-- The three dots icon from Figma --}}
            <button type="button" class="more-options-icon"> {{-- New class for this specific icon --}}
                ...
            </button>
        </div>

        {{-- CORRECTED: REMOVED THE <form> TAG HERE --}}
        {{-- Profile Details Section (Read-Only Inputs) --}}
        <div class="profile-display-details"> {{-- New class for view's details section --}}
            <div class="display-group"> {{-- New class for view's form groups --}}
                {{-- Input field for Username (read-only for display) --}}
                <input type="text" value="{{ Auth::user()->name ?? 'Selvi.Ayueeee_' }}" readonly>
            </div>

            <div class="display-group">
                {{-- Input field for Email (read-only for display) --}}
                <input type="email" value="{{ Auth::user()->email ?? 'selviayuu@gmail.com' }}" readonly>
            </div>

            <div class="display-group">
                {{-- Input field for Password (read-only, showing placeholder stars) --}}
                <input type="password" value="********" readonly> {{-- Display as stars for security --}}
            </div>

            {{-- The "EDIT PROFILE" button at the bottom (Links to the actual edit form) --}}
            <div class="display-actions"> {{-- Reused class, but will be styled specifically for view page --}}
                <a href="{{ route('profile.view') }}" class="edit-profile-btn">EDIT PROFILE</a> {{-- Changed to <a> tag and new class --}}
            </div>
        </div>
        {{-- END OF REMOVAL --}}
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Data Berhasil Diperbarui 🎉',
            text: '{{ session("success") }}',
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
            title: 'Login Gagal 😢',
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