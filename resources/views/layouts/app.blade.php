<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Santara')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- ADDED: Google Font for Javanese Text (or a similar ornamental script if Javanese Text isn't available) --}}
    {{-- 'Javanese Text' is a system font on some OS. If it's not available, you might need a similar web font.
         For a general script/ornamental feel, you might consider 'Great Vibes', 'Tangerine', or 'Pinyon Script'
         from Google Fonts as alternatives if 'Javanese Text' doesn't render. I'll use 'Great Vibes' as an example. --}}
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="top-header-bar">
        <div class="top-left-links">
            <a href="#">Favourite</a>
            <a href="#">Bookmark</a>
        </div>
        <div class="top-right-links"> 
            <a href="#">Meet Our Team</a>
            <a href="{{ route('profile.view') }}">Profile</a> 
            <div class="dropdown-settings">
                <a href="#" class="dropdown-toggle">Settings ▼</a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div> 
    </div>

    <div class="hero-banner">
        {{-- FIXED: Logo changed to image --}}
        <div class="logo">
            <img src="{{ asset('images/icons/logo.png') }}" alt="Santara Logo" class="santara-logo-img">
            <h1 class="javanese-font">Start Slayy, Start Santara !</h1>
        </div>
        
        {{-- FIXED: Profile photo and username --}}
        <div class="profile-auth">
            <img src="{{ asset('images/photos/Userprofil.png') }}" alt="User Profile" class="profile-photo">
            <span class="profile-name">Selvi.Ayueeee_</span>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>