@extends('layouts.app')
@section('title', 'Halaman Favorit')

@section('content')

    <body>


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
    @forelse($artikelFavorit as $artikel)
        <article class="article-card">
            <div class="article-header">
                <div class="article-image">
                    <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}">
                </div>
                <div class="article-info">
                    <h2 class="article-title">{{ $artikel->judul }}</h2>
                    <div class="article-meta">
                        <span><i class="far fa-calendar-alt"></i> {{ $artikel->created_at->format('d M Y') }}</span>
                        <span><i class="far fa-user"></i> {{ $artikel->penulis ?? 'Admin' }}</span>
                        <span><i class="far fa-eye"></i> {{ $artikel->views ?? '0' }} views</span>
                    </div>
                </div>
            </div>
            <p class="article-excerpt">
                {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 200) }}
            </p>
            <div class="article-actions">
                <div class="action-buttons">
                    <button class="action-btn" onclick="shareArticle({{ $artikel->id }})">
                        <i class="fas fa-share-alt"></i>
                    </button>
                    <button class="action-btn liked" onclick="toggleLike({{ $artikel->id }})">
                        <i class="fas fa-heart"></i>
                    </button>
                    <button class="action-btn bookmarked" onclick="toggleBookmark({{ $artikel->id }})">
                        <i class="fas fa-bookmark"></i>
                    </button>
                </div>
                <button class="read-more-btn">Baca Selengkapnya</button>
            </div>
        </article>
    @empty
        <p style="text-align: center; padding: 20px;">Belum ada artikel favorit.</p>
    @endforelse
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
        </script>
    @endsection
