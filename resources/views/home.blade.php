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
                <a href="{{ route('beauty-planners.index') }}">
                    <div class="icon-circle"><img src="{{ asset('images/icons/beautyplanner.png') }}" alt="Beauty Planner">
                    </div>
                    <h3>Beauty Planner</h3>
                </a>
            </div>
            <div class="feature-card">
                <a href="{{ route('rekomendasi.index') }}">
                    <div class="icon-circle"><img src="{{ asset('images/icons/rekomendasi_tips.png') }}"
                            alt="Rekomendasi & Tips"></div>
                    <h3>Rekomendasi & Tips</h3>
                </a>
            </div>
            <div class="feature-card">
                <a href="{{ route('journal.index') }}">
                    <div class="icon-circle"><img src="{{ asset('images/icons/mood_love_journal.png') }}"
                            alt="Mood & Love Journal"></div>
                    <h3>Mood & Love Journal</h3>
                </a>
            </div>
            <div class="feature-card">
                <a href="{{ route('edukasi.index') }}">
                    <div class="icon-circle"><img src="{{ asset('images/icons/edukasi.png') }}" alt="Edukasi"></div>
                    <h3>Edukasi</h3>
                </a>
            </div>
        </section>

        <section class="articles-section">
            <h2 class="section-title">Article</h2>
            <div class="article-grid">
                @foreach ($artikels as $index => $artikel)
                    <div class="article-card" onclick="showArtikelModal(this)" data-id="{{ $artikel->id }}"
                        data-judul="{{ $artikel->judul }}" data-foto="{{ asset('storage/' . $artikel->foto) }}"
                        data-isi="{{ $artikel->isi }}">
                        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}">
                        <p class="article-text">{{ $artikel->judul }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Modal Artikel -->
    <div class="modal fade" id="artikelModal" tabindex="-1" aria-labelledby="artikelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header" style="background-color: #f8cfc5;">
                    <h5 class="modal-title" id="artikelModalLabel" style="color: #6b3e2e;"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <img id="modalArtikelFoto" src="" alt="Gambar Artikel" class="img-fluid mb-3"
                        style="border-radius: 10px;">
                    <p id="modalArtikelIsi" style="color: #4a4a4a;"></p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <!-- Form Simpan ke Favorit -->
                    <form action="{{ route('artikel.favorite') }}" method="POST" id="favoriteForm">
                        @csrf
                        <input type="hidden" name="artikel_id" id="favoriteArtikelId">
                        <button type="submit" class="btn" style="background-color: #ff4fa3; color: white;">❤️
                            Suka</button>
                    </form>
{{-- 
                    <!-- Tombol Simpan -->
                    <button type="button"  data-bs-dismiss="modal">
                        Simpan Artikel
                    </button> --}}
                    <form action="{{ route('saved.store', $artikel->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success" style="border-radius: 8px;">
                            <i class="fas fa-bookmark"></i> Simpan Artikel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showArtikelModal(element) {
            const judul = element.getAttribute('data-judul');
            const foto = element.getAttribute('data-foto');
            const isi = element.getAttribute('data-isi');
            const artikelId = element.getAttribute('data-id');

            // Isi konten modal
            document.getElementById('artikelModalLabel').textContent = judul;
            document.getElementById('modalArtikelFoto').src = foto;
            document.getElementById('modalArtikelFoto').alt = judul;
            document.getElementById('modalArtikelIsi').textContent = isi;

            // Set artikel_id untuk form favorite
            document.getElementById('favoriteArtikelId').value = artikelId;

            // Tampilkan modal
            const modal = new bootstrap.Modal(document.getElementById('artikelModal'));
            modal.show();
        }
    </script>


    <script>
        function handleLogin(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const submitBtn = document.getElementById('submitBtn');

            // Basic validation
            if (!email || !password) {
                alert('Please fill in all fields');
                return;
            }

            // Add loading state
            submitBtn.textContent = 'Signing In...';
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // Reset button state
                submitBtn.textContent = 'Sign In';
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;

                // For demo purposes - show success
                alert(`Welcome back! Logged in as: ${email}`);

                // In a real app, you would redirect or update the UI
                // window.location.href = '/dashboard';
            }, 2000);
        }

        //password strength
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            const passwordInput = document.getElementById('password');

            let strength = 0;

            // Check password criteria
            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/) || password.match(/[^a-zA-Z0-9]/)) strength += 25;

            strengthBar.style.width = strength + '%';

            // Update input styling based on strength
            if (strength < 50) {
                passwordInput.classList.remove('valid');
                passwordInput.classList.add('invalid');
            } else {
                passwordInput.classList.remove('invalid');
                passwordInput.classList.add('valid');
            }
        }

        function closeModal() {
            // In a real app, this would close the modal or redirect
            alert('Close button clicked - would close modal or redirect');
        }

        function showSignUp() {
            // In a real app, this would show the sign up form
            alert('Sign Up clicked - would show registration form');
        }

        // Add input focus animations
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Login Berhasil 🎉',
                text: '{{ session('success') }}',
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
