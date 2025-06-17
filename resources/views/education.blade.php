@extends('layouts.app')
@section('title', 'Halaman Edukasi')

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
    <<div class="content-container">
    @foreach ($artikels as $artikel)
        <article class="article-card">
            <div class="article-content">
                <div class="article-image">
                    @if ($artikel->foto)
                        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                    @else
                        <div class="placeholder-image" style="background: linear-gradient(135deg, #ffa726 0%, #ff7043 100%);">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                </div>
                <div class="article-text">
                    <h2 class="article-title">{{ $artikel->judul }}</h2>
                    <p class="article-excerpt">{{ Str::limit(strip_tags($artikel->isi), 200) }}</p>
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
    @endforeach
</div>


    <script src="{{ asset('js/beautysmart.js') }}"></script>
@endsection