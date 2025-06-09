<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood & Love Journal</title>
    <style>
       /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Javanese:wght@400;500;600&display=swap');
       
        body {
            font-family: 'Noto Sans Javanese', serif;
            background: #F9F1E5;
            min-height: 100vh;
            color: #000000;
        }
        
        /* Custom CSS for each image source */
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #C38A85;
        }
        
        .plus-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            fill: currentColor;
        }
        
        .pencil-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            fill: currentColor;
        }
        
        .bookmark-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            fill: currentColor;
        }
        
        .mood-icon {
            width: 24px;
            height: 24px;
            fill: #C38A85;
        }
        
        /* Header navigation */
        .header {
            background: #743A39;
            padding: 8px 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-top: 3px solid #F2DBDA;
        }
        .nav-menu {
            display: flex;
            gap: 0;
            list-style: none;
            flex-wrap: wrap;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .nav-item {
            flex: 1;
        }
        /* Spacing between Bookmark and Beauty Planner */
        .nav-item:nth-child(2) {
            margin-right: 80px;
        }
        .nav-item:nth-child(3) {
            margin-left: 80px;
        }
        .nav-link {
            display: block;
            padding: 10px 16px;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            white-space: nowrap;
        }
        .nav-link:hover {
            background: rgba(242, 219, 218, 0.3);
            color: #000000;
        }
        .nav-link.active {
            background: rgba(242, 219, 218, 0.5);
            color: #000000;
            font-weight: 600;
        }

        /* Main title section */
        .title-section {
            text-align: center;
            padding: 20px;
            background: #FFFCF0;
            border-bottom: 3px solid #F2DBDA;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
         .lotus-logo {
    position: absolute;
    top: 5px;
    left: 10px;
    width: 80px; /* Balanced size that fits within the container */
    height: auto;
    overflow: hidden;
    object-fit: contain;
    transition: transform 0.3s ease;
    flex-shrink: 0;
}
        
        .lotus-logo:hover {
            transform: translateY(-50%) scale(1.1);
        }
        
        .main-title {
            font-size: 2.8em;
            color: #C38A87;
            font-weight: 600;
            letter-spacing: 1.5px;
            margin: 0;
            text-align: center;
        }
        
        .user-info {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .username {
            font-size: 14px;
            color: #000000;
            font-weight: 500;
        }

        /* Main content container */
        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            min-height: calc(100vh - 200px);
            gap: 80px;
            align-items: flex-start;
             padding: 30px 20px 0; /* Increased top padding from 0 to 30px */
            position: relative;
        }

        /* Sidebar */
        .sidebar {
            background: #F2DBDA;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .sidebar-header {
            padding: 25px;
            border-bottom: 2px solid rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-title {
            font-size: 1.4rem;
            color: #000000;
            font-weight: 600;
            margin: 0;
        }

        .mood-icon {
            width: 28px;
            height: 28px;
            color: #C38A85;
        }

        .user-section {
            padding: 20px 25px;
            background: rgba(255,255,255,0.3);
            border-radius: 8px;
            margin: 20px;
            border: 2px solid #CF9E9A;
        }

        .user-name {
            font-size: 16px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 5px;
        }

        .new-journal-btn {
            background: #CF9E9A;
            color: #FFFFFF;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .new-journal-btn:hover {
            background: #C38A85;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .sidebar-menu {
            padding: 20px 0;
            list-style: none;
        }

        .sidebar-link {
            display: block;
            padding: 15px 25px;
            color: #000000;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .sidebar-link:hover {
            background: rgba(255,255,255,0.4);
            border-left-color: #C38A85;
            transform: translateX(5px);
        }

        /* Main Content */
        .main-content {
            background: #FFFCF0;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .content-header {
            background: #F2DBDA;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #CF9E9A;
        }

        .page-title {
            font-size: 2rem;
            color: #C38A85;
            font-weight: 600;
            margin: 0;
        }

        /* Journal Entry */
        .journal-entry {
            padding: 30px;
        }

        .entry-item {
            background: #FFFFFF;
            border: 2px solid #F2DBDA;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .entry-item:hover {
            border-color: #CF9E9A;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .entry-title {
            font-size: 1.3rem;
            color: #C38A85;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F2DBDA;
        }

        .entry-content {
            color: #000000;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .entry-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #666;
            font-size: 14px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #F2DBDA;
        }

        .entry-date {
            color: #C38A85;
            font-weight: 500;
        }

        .entry-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-edit {
            background: #CF9E9A;
            color: #FFFFFF;
        }

        .btn-edit:hover {
            background: #C38A85;
        }

        .btn-delete {
            background: #dc3545;
            color: #FFFFFF;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 30px;
            color: #666;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            color: #C38A85;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 1.5rem;
            color: #C38A85;
            margin-bottom: 10px;
        }

        .empty-text {
            font-size: 16px;
            margin-bottom: 30px;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 280px 1fr;
                gap: 20px;
                padding: 20px 15px;
            }

            .main-title {
                font-size: 2.4em;
            }

            .lotus-logo {
                width: 50px;
                height: 50px;
                left: 15px;
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .sidebar {
                order: 2;
            }

            .main-content {
                order: 1;
            }

            .title-section {
                flex-direction: column;
                text-align: center;
                padding: 15px;
                padding-left: 20px;
            }

            .lotus-logo {
                position: relative;
                top: auto;
                left: auto;
                margin-bottom: 10px;
                transform: none;
            }

            .user-info {
                position: static;
                transform: none;
                justify-content: center;
                margin-top: 15px;
            }

            .main-title {
                font-size: 2em;
                margin-top: 10px;
            }

            .nav-menu {
                flex-direction: column;
                gap: 5px;
            }

            .nav-item {
                min-width: auto;
            }

            .nav-link {
                font-size: 11px;
                padding: 8px 10px;
            }

            .content-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .journal-entry {
                padding: 20px;
            }

            .entry-item {
                padding: 20px;
            }

            .nav-item:nth-child(2) {
                margin-right: 8px;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 1.6em;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .entry-title {
                font-size: 1.1rem;
            }

            .entry-content {
                font-size: 14px;
            }

            .entry-meta {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .sidebar-header {
                padding: 20px;
            }

            .sidebar-title {
                font-size: 1.2rem;
            }

            .nav-link {
                font-size: 11px;
                padding: 8px 10px;
            }
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
    </style>
</head>
<body>
    <!-- Header Navigation -->
    <header class="header">
        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Favourite</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Bookmark</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Beauty Planner</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Rekomendasi & Tips</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Mood & Love Journal</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Edukasi</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Title Section -->
    <section class="title-section">
        <img src="4ad477c423e05a2bcc2e4f594a9f36f0bee3f510.png" alt="Logo" class="lotus-logo">
        <h1 class="main-title">Start Slay, Start Santara!</h1>
        <div class="user-info">
            <img src="77acbd833d9739aa7ab5a6ca2270d0136a8a561e.png" alt="User Avatar" class="user-avatar">
            <span class="username">Selvi.Ayueeee_</span>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <svg class="mood-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                <h2 class="sidebar-title">Mood & Love Journal</h2>
            </div>

            <div class="user-section">
                <div class="user-name">Selvi.Ayueeee_'s Journey</div>
                <a href="#" class="new-journal-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>
                    New Journal
                </a>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="#" class="sidebar-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                        </svg>
                        View All Journal
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content fade-in">
            <div class="content-header">
                <h2 class="page-title">Mood & Love Journal</h2>
            </div>

            <div class="journal-entry">
                <!-- Sample Journal Entry 1 -->
                <div class="entry-item">
                    <h3 class="entry-title">Title</h3>
                    <div class="entry-content">
                        This is a sample journal entry content. It could contain your thoughts, feelings, and experiences about your day...
                    </div>
                    <div class="entry-meta">
                        <span class="entry-date">Nov 15, 2024</span>
                        <div class="entry-actions">
                            <a href="#" class="btn btn-edit">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                                Read More
                            </a>
                            <button class="btn btn-delete" onclick="return confirm('Are you sure?')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sample Journal Entry 2 -->
                <div class="entry-item">
                    <h3 class="entry-title">Daftar Olahraga</h3>
                    <div class="entry-content">
                        Today I created my exercise routine and workout plan. I want to focus on building strength and maintaining a healthy lifestyle...
                    </div>
                    <div class="entry-meta">
                        <span class="entry-date">Nov 14, 2024</span>
                        <div class="entry-actions">
                            <a href="#" class="btn btn-edit">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                                Read More
                            </a>
                            <button class="btn btn-delete" onclick="return confirm('Are you sure?')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Navigation handling
       document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                navMenu.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            }
        });
    });

     // Close menu when window is resized to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            navMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
        }
    });
    
    // Handle active nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
            }
            
            // Remove active class from all links
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
        });
    });

        // Add smooth scrolling
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

        // Initialize page animations
        document.addEventListener('DOMContentLoaded', function() {
            const entries = document.querySelectorAll('.entry-item');
            entries.forEach((entry, index) => {
                entry.style.animationDelay = `${index * 0.1}s`;
                entry.classList.add('fade-in');
            });
        });
    </script>
</body>
</html>