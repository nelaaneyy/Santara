<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Santara')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- ADDED: Google Font for Javanese Text (or a similar ornamental script if Javanese Text isn't available) --}}
    {{-- 'Javanese Text' is a system font on some OS. If it's not available, you might need a similar web font.
         For a general script/ornamental feel, you might consider 'Great Vibes', 'Tangerine', or 'Pinyon Script'
         from Google Fonts as alternatives if 'Javanese Text' doesn't render. I'll use 'Great Vibes' as an example. --}}
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/education.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/favorite.css') }}" />
    <style>
        /* Reset and base styles */
        a {
            text-decoration: none;
        }

        .page-title {
            font-size: 2rem;
            /* Ukuran besar */
            font-weight: 400;
            border: none;
            background-color: transparent;
            color: #b47777;
            /* Warna teks merah muda seperti pada gambar */
            outline: none;
            width: 100%;
            text-align: left;
            padding: 0;
        }

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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-top: 3px solid #F2DBDA;
        }

        .nav-menu {
            display: flex;
            gap: 0;
            list-style: none;
            flex-wrap: wrap;
            background: rgba(255, 255, 255, 0.1);
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
            width: 80px;
            /* Balanced size that fits within the container */
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
            padding: 30px 20px 0;
            /* Increased top padding from 0 to 30px */
            position: relative;
        }

        /* Sidebar */
        .sidebar {
            background: #F2DBDA;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .sidebar-header {
            padding: 25px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
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
            background: rgba(255, 255, 255, 0.3);
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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
            background: rgba(255, 255, 255, 0.4);
            border-left-color: #C38A85;
            transform: translateX(5px);
        }

        /* Main Content */
        .main-content {
            background: #FFFCF0;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
    <style>
        .profile-fields {
            display: grid;
            gap: 16px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .separator {
            margin: 0 8px;
        }

        .form-group label {
            width: 120px;
            text-align: left;
            margin-right: 8px;
            white-space: nowrap;
        }

        .form-group input {
            flex: 1;
            padding: 6px 10px;
        }
    </style>
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
            width: 80px;
            /* Balanced size that fits within the container */
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-top: 3px solid #F2DBDA;
        }

        .nav-menu {
            display: flex;
            gap: 0;
            list-style: none;
            flex-wrap: wrap;
            background: rgba(255, 255, 255, 0.1);
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
            padding: 30px 20px 0;
            /* Increased top padding from 0 to 30px */
            position: relative;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #F2DBDA;
            padding: 20px 0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            position: sticky;
            top: 20px;
            min-height: calc(100vh - 180px);
        }

        .sidebar-title {
            padding: 0 25px 20px;
            font-size: 1.3em;
            color: #000000;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
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
            background: rgba(255, 255, 255, 0.4);
            border-left-color: #C38A85;
            transform: translateX(5px);
        }

        /* Main content area */
        .main-content {
            flex: 1;
            background: #F2DBDA;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
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
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,400;1,300;1,500;1,600;1,800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Javanese Text:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Italianno:wght@400&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- ADDED: Google Font for Javanese Text (or a similar ornamental script if Javanese Text isn't available) --}}
    {{-- 'Javanese Text' is a system font on some OS. If it's not available, you might need a similar web font.
         For a general script/ornamental feel, you might consider 'Great Vibes', 'Tangerine', or 'Pinyon Script'
         from Google Fonts as alternatives if 'Javanese Text' doesn't render. I'll use 'Great Vibes' as an example. --}}
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <header class="main-header">
        <div class="top-header-bar">
            <div class="top-left-links">
                <a href="{{ route('favorit.index') }}">Favourite</a>
                <a href="{{ route('saved.index') }}">Bookmark</a>
            </div>
            <div class="top-right-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('team') }}">Meet Our Team</a>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="{{ route('Feedback.index') }}">Beri Masukkan</a> <!-- Tambahan tautan baru -->
                <div class="dropdown-settings">
                    <a href="#" class="dropdown-toggle">Settings ▼</a>
                    <ul class="dropdown-content">
                        <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="hero-banner">
            {{-- FIXED: Logo changed to image --}}
            <div class="logo">
                <img src="{{ asset('images/icons/logo.png') }}" alt="Santara Logo" class="santara-logo-img">
                <h1 class="javanese-font">Start Slayy, Start Santara !</h1>
            </div>

            {{-- FIXED: Profile photo and username --}}
            <div class="profile-auth">
                <img src="{{ asset('images/photos/Userprofil.png') }}" alt="User Profile" class="profile-photo">
                @if (Auth::check())
                    <span class="profile-name">{{ Auth::user()->name }}!</span>
                @endif
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>
