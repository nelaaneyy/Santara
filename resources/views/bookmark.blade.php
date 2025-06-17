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
    <div class="articles-container">
    @foreach ($artikelFavorit as $artikel)
        <article class="article-card">
            <div class="article-header">
                <div class="article-image">
                    @if ($artikel->foto)
                        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}">
                    @else
                        <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image">
                    @endif
                </div>
                <div class="article-info">
                    <h2 class="article-title">{{ $artikel->judul }}</h2>
                    <div class="article-meta">
                        <span><i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($artikel->created_at)->translatedFormat('d F Y') }}</span>
                        <span><i class="far fa-user"></i> {{ $artikel->nama_pembuat ?? 'Admin' }}</span>
                        <span><i class="far fa-eye"></i> {{ rand(1000, 3000) }} views</span> {{-- Sementara --}}
                    </div>
                </div>
            </div>
            <p class="article-excerpt" id="excerpt-{{ $artikel->id }}">
                {{ Str::limit(strip_tags($artikel->isi), 250, '...') }}
            </p>
            <p class="article-full" id="full-{{ $artikel->id }}" style="display: none;">
                {{ strip_tags($artikel->isi) }}
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
                <button class="read-more-btn" onclick="toggleArticle({{ $artikel->id }})"
                    id="btn-{{ $artikel->id }}">Baca Selengkapnya</button>
            </div>
        </article>
    @endforeach
</div>



    <script>
        function toggleArticle(id) {
            const excerpt = document.getElementById('excerpt-' + id);
            const full = document.getElementById('full-' + id);
            const button = document.getElementById('btn-' + id);

            if (excerpt.style.display === 'none') {
                excerpt.style.display = 'block';
                full.style.display = 'none';
                button.innerText = 'Baca Selengkapnya';
            } else {
                excerpt.style.display = 'none';
                full.style.display = 'block';
                button.innerText = 'Tutup';
            }
        }
    </script>

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
    <script src="{{ asset('js/beautysmart.js') }}"></script>
@endsection
