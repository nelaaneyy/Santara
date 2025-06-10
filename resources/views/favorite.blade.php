<!DOCTYPE html>
<html lang="id">
<head>
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santara - Halaman Favorit</title>
  	<link rel="stylesheet"  href="{{asset('css/favorite.css')}}"/>
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


	<!-- content 
	<div class="topik-yang-disukai">Topik Yang Disukai</div>
  	</div>	
    		<div class="makan-buah-ini">Makan Buah Ini Untuk Kecantikan,  Alami dan Enak</div>
    		<div class="rahasia-kulit-no">Rahasia Kulit No Kerutan Di Usia 30 Tahun, Mari Merawat Kulit Anda</div>
    		<div class="rahasia-kulit-no1">Rahasia Kulit No Kerutan Di Usia 30 Tahun, Mari Merawat Kulit Anda</div>
    		<div class="lorem-ipsum-dolor">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Exceunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    		<div class="lorem-ipsum-dolor1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Exceunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    		<div class="lorem-ipsum-dolor2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Exceunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    -->	
	    <!-- Main Content -->
    <main class="main-content">
        <div class="topik-yang-disukai">Topik Yang Disukai</div>
        
        <div class="articles-container">
            <!-- Article 1 -->
            <article class="article-card">
                <div class="article-header">
                    <div class="article-image">
                        <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=400&h=300&fit=crop" alt="Buah Segar">
                    </div>
                    <div class="article-info">
                        <h2 class="article-title">Makan Buah Ini Untuk Kecantikan, Alami dan Enak</h2>
                        <div class="article-meta">
                            <span><i class="far fa-calendar-alt"></i> 15 Mei 2024</span>
                            <span><i class="far fa-user"></i> Admin Santara</span>
                            <span><i class="far fa-eye"></i> 1.2k views</span>
                        </div>
                    </div>
                </div>
                <p class="article-excerpt">
                    Buah-buahan segar kaya akan vitamin dan antioksidan yang sangat baik untuk kesehatan kulit. Konsumsi rutin buah-buahan tertentu dapat membantu menjaga kelembaban kulit, mencegah penuaan dini, dan memberikan nutrisi yang dibutuhkan tubuh. Temukan pilihan buah terbaik untuk kecantikan alami yang mudah ditemukan di sekitar kita.
                </p>
                <div class="article-actions">
                    <div class="action-buttons">
                        <button class="action-btn" onclick="shareArticle(1)">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="action-btn liked" onclick="toggleLike(1)">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button class="action-btn bookmarked" onclick="toggleBookmark(1)">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <button class="read-more-btn">Baca Selengkapnya</button>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="article-card">
                <div class="article-header">
                    <div class="article-image">
                        <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?w=400&h=300&fit=crop" alt="Perawatan Kulit">
                    </div>
                    <div class="article-info">
                        <h2 class="article-title">Rahasia Kulit No Kerutan Di Usia 30 Tahun, Mari Merawat Kulit Anda</h2>
                        <div class="article-meta">
                            <span><i class="far fa-calendar-alt"></i> 12 Mei 2024</span>
                            <span><i class="far fa-user"></i> Dr. Beauty</span>
                            <span><i class="far fa-eye"></i> 2.1k views</span>
                        </div>
                    </div>
                </div>
                <p class="article-excerpt">
                    Perawatan kulit yang konsisten adalah kunci untuk menjaga elastisitas dan kelembutan kulit di usia produktif. Dengan menggunakan produk yang tepat sesuai jenis kulit dan melakukan perawatan harian yang rutin, Anda dapat mencegah tanda-tanda penuaan dini dan menjaga kulit tetap sehat bercahaya. Pelajari tips efektif dari para ahli kecantikan.
                </p>
                <div class="article-actions">
                    <div class="action-buttons">
                        <button class="action-btn" onclick="shareArticle(2)">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="action-btn liked" onclick="toggleLike(2)">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button class="action-btn" onclick="toggleBookmark(2)">
                            <i class="far fa-bookmark"></i>
                        </button>
                    </div>
                    <button class="read-more-btn">Baca Selengkapnya</button>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="article-card">
                <div class="article-header">
                    <div class="article-image">
                        <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?w=400&h=300&fit=crop" alt="Skincare Natural">
                    </div>
                    <div class="article-info">
                        <h2 class="article-title">Rahasia Kulit No Kerutan Di Usia 30 Tahun, Mari Merawat Kulit Anda</h2>
                        <div class="article-meta">
                            <span><i class="far fa-calendar-alt"></i> 10 Mei 2024</span>
                            <span><i class="far fa-user"></i> Beauty Expert</span>
                            <span><i class="far fa-eye"></i> 1.8k views</span>
                        </div>
                    </div>
                </div>
                <p class="article-excerpt">
                    Temukan rahasia perawatan kulit alami yang telah terbukti efektif untuk menjaga kecantikan dan kesehatan kulit. Dengan bahan-bahan alami yang mudah ditemukan dan rutinitas perawatan yang sederhana namun efektif, Anda dapat memiliki kulit yang sehat, lembut, dan bercahaya alami tanpa harus mengeluarkan biaya yang besar.
                </p>
                <div class="article-actions">
                    <div class="action-buttons">
                        <button class="action-btn" onclick="shareArticle(3)">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="action-btn liked" onclick="toggleLike(3)">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button class="action-btn bookmarked" onclick="toggleBookmark(3)">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                    <button class="read-more-btn">Baca Selengkapnya</button>
                </div>
            </article>
        </div>
    </main>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
        }

        // Article interaction functions
        function toggleLike(articleId) {
            const likeBtn = event.target.closest('.action-btn');
            likeBtn.classList.toggle('liked');
            
            if (likeBtn.classList.contains('liked')) {
                likeBtn.innerHTML = '<i class="fas fa-heart"></i>';
                console.log(`Article ${articleId} liked`);
            } else {
                likeBtn.innerHTML = '<i class="far fa-heart"></i>';
                console.log(`Article ${articleId} unliked`);
            }
        }

        function toggleBookmark(articleId) {
            const bookmarkBtn = event.target.closest('.action-btn');
            bookmarkBtn.classList.toggle('bookmarked');
            
            if (bookmarkBtn.classList.contains('bookmarked')) {
                bookmarkBtn.innerHTML = '<i class="fas fa-bookmark"></i>';
                console.log(`Article ${articleId} bookmarked`);
            } else {
                bookmarkBtn.innerHTML = '<i class="far fa-bookmark"></i>';
                console.log(`Article ${articleId} unbookmarked`);
            }
        }

        function shareArticle(articleId) {
            if (navigator.share) {
                navigator.share({
                    title: 'Santara - Beauty Tips',
                    text: 'Check out this amazing beauty article!',
                    url: window.location.href
                });
            } else {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link berhasil disalin!');
                });
            }
            console.log(`Article ${articleId} shared`);
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobileNav');
            const toggleBtn = document.querySelector('.mobile-menu-toggle');
            
            if (!mobileNav.contains(event.target) && !toggleBtn.contains(event.target)) {
                mobileNav.classList.remove('active');
            }
        });

        // Smooth scroll for read more buttons
        document.querySelectorAll('.read-more-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Simulate navigation to article detail
                console.log('Navigate to article detail page');
                // You can add actual navigation logic here
            });
        });
</body>
</html>