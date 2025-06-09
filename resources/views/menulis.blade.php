<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menulis Journal</title>
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
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
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
        
        .lotus-logo:hover {
            transform: scale(5.0);
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
            gap: 8px;
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
            width: 280px;
            background: #F2DBDA;
            padding: 20px 0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            flex-shrink: 0;
            position: sticky;
            top: 20px;
            min-height: calc(100vh - 180px);
        }
        .sidebar-title {
            padding: 0 25px 20px;
            font-size: 1.3em;
            color: #000000;
            border-bottom: 2px solid rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        .sidebar-item {
            margin-bottom: 8px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #000000;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-size: 15px;
            font-weight: 500;
        }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.4);
            border-left-color: #C38A85;
            transform: translateX(5px);
        }

        /* Main content area */
        .main-content {
            flex: 1;
            background: #F2DBDA;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            position: relative;
        }
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #F2DBDA;
        }
        .page-title {
            font-size: 2.5em;
            color: #C38A85;
            font-weight: normal;
            margin: 0;
        }
        .save-button {
            background: #CF9E9A;
            color: #FFFFFF;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            background: #C38A85;
        }

        /* Text input area */
        .text-input {
            width: 100%;
            min-height: 450px;
            border: 2px solid #F2DBDA;
            border-radius: 12px;
            padding: 25px;
            font-size: 16px;
            font-family: inherit;
            line-height: 1.8;
            resize: vertical;
            background: #FFFCF0;
            color: #000000;
            transition: all 0.3s ease;
        }
        .text-input:focus {
            outline: none;
            border-color: #CF9E9A;
            box-shadow: 0 0 15px rgba(207, 158, 154, 0.2);
            background: #FFFCF0;
        }
        .text-input::placeholder {
            color: #C38A85;
            font-style: italic;
            opacity: 0.7;
        }

        /* Responsive design */
        @media (max-width: 1024px) {
            .container {
                gap: 40px;
                padding: 0 15px;
            }
           
            .sidebar {
                width: 240px;
            }
            
            .main-title {
                font-size: 2.4em;
            }
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                gap: 20px;
            }
           
            .sidebar {
                width: 100%;
                order: 2;
                position: static;
            }
           
            .main-content {
                order: 1;
                padding: 25px;
            }
           
            .user-info {
                position: static;
                transform: none;
                justify-content: center;
                margin-top: 15px;
            }
           
            .title-section {
                flex-direction: column;
                text-align: center;
                padding-left: 20px;
            }
           
            .lotus-logo {
                position: relative;
                top: auto;
                left: auto;
                margin-bottom: 10px;
            }
           
            .main-title {
                font-size: 2em;
                margin-top: 10px;
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
                font-size: 2em;
            }
           
            .text-input {
                min-height: 350px;
                padding: 20px;
                font-size: 14px;
            }
           
            .nav-link {
                font-size: 11px;
                padding: 8px 10px;
            }
        }

        /* Loading and interaction states */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Enhanced visual effects */
        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #C38A85;
            border-radius: 12px 12px 0 0;
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
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <h2 class="sidebar-title">
                <img src="tabler_mood-edit (1).svg" alt="Mood Icon" class="mood-icon">
                Mood & Love Journal
            </h2>
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img src="ei_plus.svg" alt="Plus Icon" class="plus-icon">
                        New Journal
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <img src="f7_pencil-outline.svg" alt="Pencil Icon" class="pencil-icon">
                        View All Journal
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content fade-in">
            <div class="content-header">
                <h2 class="page-title" contenteditable="true">Tittle</h2>
                <button class="save-button" onclick="saveJournal()">Save now</button>
            </div>
           
            <!-- Journal Writing Area -->
            <textarea
                class="text-input"
                placeholder="What do you want to write today?"
                oninput="handleInput(this)"
                onfocus="handleFocus(this)"
                onblur="handleBlur(this)"
            ></textarea>
        </main>
    </div>

    <script>
        // Handle text input interactions
        function handleInput(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
            window.draftContent = textarea.value;
        }

        function handleFocus(textarea) {
            textarea.parentElement.classList.add('active');
        }

        function handleBlur(textarea) {
            textarea.parentElement.classList.remove('active');
        }

        // Save journal functionality
        function saveJournal() {
            const content = document.querySelector('.text-input').value;
            const button = document.querySelector('.save-button');
           
            if (!content.trim()) {
                alert('Please write something before saving!');
                return;
            }

            button.textContent = 'Saving...';
            button.classList.add('loading');
           
            setTimeout(() => {
                button.textContent = 'Saved!';
                button.style.background = '#28a745';
               
                setTimeout(() => {
                    button.textContent = 'Save now';
                    button.style.background = '';
                    button.classList.remove('loading');
                }, 2000);
            }, 1000);
        }

        // Navigation handling
        document.querySelectorAll('.nav-link, .sidebar-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
               
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
               
                if (this.classList.contains('nav-link')) {
                    this.classList.add('active');
                }
               
                console.log('Navigating to:', this.textContent);
            });
        });

        // Auto-save functionality
        setInterval(() => {
            const content = document.querySelector('.text-input').value;
            if (content && content !== window.lastSavedContent) {
                window.lastSavedContent = content;
                console.log('Auto-saved draft');
            }
        }, 30000);

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            if (window.draftContent) {
                document.querySelector('.text-input').value = window.draftContent;
            }
           
            document.querySelector('.text-input').focus();
        });
    </script>
</body>
</html>