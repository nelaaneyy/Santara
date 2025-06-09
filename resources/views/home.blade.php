@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="banner-text">
             {{-- ADDED CLASS FOR JAVANESE FONT --}}
            <div class="quote-box">
                <p>"Let your glow shine so bright that it blinds those who doubted you."</p>
                <p class="quote-author">- Beyoncé</p> 
            </div>
        </div>
<div class="main-content-area">
    <section class="features-section">
        <div class="feature-card">
            <a href="{{ route('beauty.planner') }}#"> 
                <div class="icon-circle"><img src="{{ asset('images/icons/beautyplanner.png') }}" alt="Beauty Planner"></div>
                <h3>Beauty Planner</h3>
            </a>
        </div>
        <div class="feature-card">
            <a href="#"> 
                <div class="icon-circle"><img src="{{ asset('images/icons/rekomendasi_tips.png') }}" alt="Rekomendasi & Tips"></div>
                <h3>Rekomendasi & Tips</h3>
            </a>
        </div>
        <div class="feature-card">
            <a href="#">
                <div class="icon-circle"><img src="{{ asset('images/icons/mood_love_journal.png') }}" alt="Mood & Love Journal"></div>
                <h3>Mood & Love Journal</h3>
            </a>
        </div>
        <div class="feature-card">
            <a href="#">
                <div class="icon-circle"><img src="{{ asset('images/icons/edukasi.png') }}" alt="Edukasi"></div>
                <h3>Edukasi</h3>
            </a>
        </div>
    </section>

    <section class="articles-section">
        <h2 class="section-title">Article</h2>
        <div class="article-grid">
            <div class="article-card">
                <img src="{{ asset('images/photos/berita1.png') }}" alt="10 Etika ke Paris">
                <p class="article-text">10 Etika yang Harus Dipahami saat Berkunjung ke Paris</p>
            </div>
            <div class="article-card">
                <img src="{{ asset('images/photos/berita2.png') }}" alt="Urutan Nail Art">
                <p class="article-text">Urutan Nail Art yang Tepat, Agar Tahan Lama & Hasil Maksimal</p>
            </div>
            <div class="article-card">
                <img src="{{ asset('images/photos/berita3.png') }}" alt="Perempuan Kuat Shani Indira">
                <p class="article-text">Perempuan Kuat Versi Shani Indira: 'Kenali Diri, Ambisius, & Positif'</p>
            </div>
            <div class="article-card">
                <img src="{{ asset('images/photos/berita4.png') }}" alt="Model Jahitan Baju Batik">
                <p class="article-text">11 Model Jahitan Baju Batik Perempuan Terbaru, Simpel dan Elegan!</p>
            </div>
            <div class="article-card full-width-card">
                <img src="{{ asset('images/photos/berita5.png') }}" alt="LANEIGE Promotion">
                <p class="article-text">LANEIGE hadirkan perawatan baru Anti-Aging</p>
            </div>
        </div>
    </section>
</div>
@endsection
