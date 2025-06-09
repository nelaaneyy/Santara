<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <title>Meet Our Team - Santara</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,400;1,300;1,500;1,600;1,800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Javanese Text:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Italianno:wght@400&display=swap" />

</head>

<body>
<header class="header">
        <nav class="navbartop">
            <ul class="nav-links" id="navLinks">
                <li class="navli"><a href="#" class="nav-a">Favourite</a></li>
                <li class="navli"><a href="#" class="nav-a">Bookmark</a></li>
                <li class="navli"><a href="#" class="nav-a">Beauty Planner</a></li>
                <li class="navli"><a href="#" class="nav-a">Rekomendasi & Tips</a></li>
                <li class="navli"><a href="#" class="nav-a">Mood & Love Journal</a></li>
                <li class="navli"><a href="#" class="nav-a">Edukasi</a></li>
            </ul>
        </nav>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('santaralogo.png') }}" alt="santaralogo">
            </div>
            <div style="display: flex; align-items: center; gap: 1rem;">
                <a href="{{ url('/signup') }}" class="auth-btn">
                    Login or Signup
                </a>
                <button class="mobile-menu-btn" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Hero Section -->
        <section class="hero-section">
            <h1 class="hero-title">Meet the team that makes <br> the magic happen</h1>
            <p class="hero-description">
                Meet our diverse team of designers, back end and UI developers who bring creativity and expertise to every project.
            </p>
        </section>

        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button class="filter-btn active" onclick="filterTeam('All')">Semua</button>
            <button class="filter-btn" onclick="filterTeam('Designer')">Designer</button>
            <button class="filter-btn" onclick="filterTeam('Front-End')">Front-End</button>
            <button class="filter-btn" onclick="filterTeam('Back-End')">Back-End</button>
        </div>

        <!-- Team Grid -->
        <div class="team-grid" id="teamGrid">
            <!-- Team Member 1 -->
            <div class="team-card" data-category="Designer">
                <div class="card-image">
                    <img src="{{ asset('qonek.webp') }}" alt="Direktur Utama Perusahaan">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <h3 class="member-name">Qonita Ghina Anbarputri </h3>
                    <p class="member-role">Frontend Dasar & Interaktif</p>
                    <p class="member-description">
                        Membuat tampilan web.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-card" data-category="Back-End">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop&crop=face" alt="Backend Developer">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <h3 class="member-name">Backend</h3>
                    <p class="member-role">Senior Backend Developer</p>
                    <p class="member-description">
                        Mengembangkan arsitektur server yang robust dan API yang efisien untuk mendukung semua fitur aplikasi.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-card" data-category="Designer">
                <div class="card-image">
                    <img src="{{ asset('piselpi.jpg') }}" alt="UI/UX Researcher">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <h3 class="member-name">UI/UX Researcher</h3>
                    <p class="member-role">Lead UX Designer</p>
                    <p class="member-description">
                        Meneliti kebutuhan pengguna dan merancang pengalaman yang intuitif untuk meningkatkan kepuasan pengguna.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-behance"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="team-card" data-category="Designer">
                <div class="card-image">
                    <img src="{{ asset('neyo.jpg') }}" alt="UI/UX Student Makerz">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <h3 class="member-name">UI/UX Student Makerz</h3>
                    <p class="member-role">Junior UI Designer</p>
                    <p class="member-description">
                        Mahasiswa yang bersemangat dalam bidang desain, berkontribusi dengan ide-ide segar dan perspektif baru.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 5 -->
            <div class="team-card" data-category="Designer">
                <div class="card-image">
                    <img src="{{ asset('depala.jpg') }}" alt="UI/UX Agentic React">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <h3 class="member-name">Agentic Analisis React</h3>
                    <p class="member-role">Frontend Specialist</p>
                    <p class="member-description">
                        Spesialis dalam pengembangan antarmuka yang reaktif dan analisis user behavior untuk optimasi pengalaman.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-react"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Mobile Menu Toggle
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        // Team Filter Function
        function filterTeam(category) {
            const cards = document.querySelectorAll('.team-card');
            const buttons = document.querySelectorAll('.filter-btn');
            
            // Update active button
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            // Filter cards
            cards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeInUp 0.6s ease-out';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const navLinks = document.getElementById('navLinks');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            
            if (!navLinks.contains(event.target) && !mobileBtn.contains(event.target)) {
                navLinks.classList.remove('active');
            }
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.9)';
            }
        });
    </script>
</body>

</html>
