<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santara - Halaman Edukasi</title>
    <link rel="stylesheet" href="{{asset('css/education.css')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo 2:wght@400&display=swap" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Javanese Text:wght@400&display=swap" />
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <a href="#" class="nav-link">Favourite</a>
                <a href="#" class="nav-link">Bookmark</a>
            </div>
            <div class="nav-right">
                <a href="#" class="nav-link">Meet Our Team</a>
                <a href="#" class="nav-link">Profile</a>
                <a href="#" class="nav-link">Settings</a>
            </div>
        </div>
    </nav>

    <!-- Main Header -->
    <header class="main-header">
        <div class="header-content">
            <div class="logo-container">
                <div class="logo">
                        <img src="{{ asset('icons/logo_Santara.png')}}" alt="Logo Santara">
                </div>
            </div>
            
            <h1 class="main-title">Start Slayy, Start Santara !</h1>
            
           <div class="profile-section">
                <div class="profile-pic">
                        <img src="{{ asset('icons/profil_Santara.png')}}" alt="Profile Picture">
                </div>
                <span class="profile-name">Selvi Ayueeee</span>
            </div>
        </div>
    </header>

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
    <div class="content-container">
        <!-- Article 1 -->
        <article class="article-card">
            <div class="article-content">
                <div class="article-image">
                    <div class="placeholder-image">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
                <div class="article-text">
                    <h2 class="article-title">Rahasia Kulit No Kerutan Di Usia 30 Tahun, Mari Merawat Kulit Anda</h2>
                    <p class="article-excerpt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <div class="article-actions">
                        <button class="action-btn" title="Share">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="action-btn" title="Like">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="action-btn" title="Bookmark">
                            <i class="far fa-bookmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <!-- Article 2 -->
        <article class="article-card">
            <div class="article-content">
                <div class="article-image">
                    <div class="placeholder-image" style="background: linear-gradient(135deg, #ffa726 0%, #ff7043 100%);">
                        <i class="fas fa-apple-alt"></i>
                    </div>
                </div>
                <div class="article-text">
                    <h2 class="article-title">Makan Buah Ini Untuk Kecantikan, Alami dan Enak</h2>
                    <p class="article-excerpt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <div class="article-actions">
                        <button class="action-btn" title="Share">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="action-btn" title="Like">
                            <i class="far fa-heart"></i>
                        </button>
                        <button class="action-btn" title="Bookmark">
                            <i class="far fa-bookmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </div>

    <script src="{{ asset('js/beautysmart.js') }}"></script>
</body>
</html> 