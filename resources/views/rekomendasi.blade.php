@extends('layouts.app')
@section('title', 'Halaman Rekomendasi')

@section('content')
    <!-- Brand Section -->
    <div class="brand-section">
        <div class="brand-name">
            <div class="brand-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            BeautySmart
        </div>
    </div>

    <!-- Content -->
    <div class="main-content-area">
    <div class="rekomendasi-section">
        {{-- First Post --}}
        <div class="rekomendasi-card">
            <div class="image-container">
                <img src="{{ asset('images/photos/rekomendasi.png') }}" alt="Before Skincare" class="rekomendasi-img">
            </div>
            <div class="text-content">
                <h2 class="lorem-ipsum-title">Lorem Ipsum</h2>
                <p class="lorem-ipsum-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="action-icons">
                    <button class="icon-btn"><img src="{{ asset('images/icons/love.png') }}" alt="Like"></button>
                    <button class="icon-btn"><img src="{{ asset('images/icons/bookmark.png') }}" alt="Bookmark"></button>
                    <button class="icon-btn"><img src="{{ asset('images/icons/share.png') }}" alt="Share"></button>
                </div>
            </div>
        </div>

        {{-- Second Post (Duplicated) --}}
        <div class="rekomendasi-card">
            <div class="image-container">
                <img src="{{ asset('images/photos/rekomendasi.png') }}" alt="Before Skincare" class="rekomendasi-img">
            </div>
            <div class="text-content">
                <h2 class="lorem-ipsum-title">Lorem Ipsum</h2>
                <p class="lorem-ipsum-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="action-icons">
                    <button class="icon-btn"><img src="{{ asset('images/icons/love.png') }}" alt="Like"></button>
                    <button class="icon-btn"><img src="{{ asset('images/icons/bookmark.png') }}" alt="Bookmark"></button>
                    <button class="icon-btn"><img src="{{ asset('images/icons/share.png') }}" alt="Share"></button>
                </div>
            </div>
        </div>
 <div class="rekomendasi-card">
            <div class="image-container">
                <img src="{{ asset('images/photos/rekomendasi.png') }}" alt="Before Skincare" class="rekomendasi-img">
            </div>
            <div class="text-content">
                <h2 class="lorem-ipsum-title">Lorem Ipsum</h2>
                <p class="lorem-ipsum-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="action-icons">
                    <button class="icon-btn"><img src="{{ asset('images/icons/love.png') }}" alt="Like"></button>
                    <button class="icon-btn"><img src="{{ asset('images/icons/bookmark.png') }}" alt="Bookmark"></button>
                    <button class="icon-btn"><img src="{{ asset('images/icons/share.png') }}" alt="Share"></button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/beautysmart.js') }}"></script>
@endsection
