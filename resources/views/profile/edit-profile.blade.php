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
                    <label for="username">Username :</label>
                    <input type="text" id="username" name="username" value="{{ Auth::user()->username ?? 'selvi.ayueeee' }}">
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? 'selvi@example.com' }}">
                </div>

                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="save-button">SAVE</button>
                <button type="button" class="cancel-button" onclick="window.location='{{ route('profile.view') }}'">CANCEL</button>
            </div>
        </form>
    </div>
</div>
@endsection
