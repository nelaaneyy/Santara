<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menulis Journal</title>
    
</head>
@extends('layouts.app')
@section('title', 'Menulis Journal')

@section('content')

    <!-- Main Container -->
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <h2 class="sidebar-title">
                <img src="{{ asset('images/icons/mood.png') }}" alt="Mood Icon" class="mood-icon">
                Mood & Love Journal
            </h2>
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="{{ route('menulis-journal.menulis') }}" class="sidebar-link">
                        <img src="{{ asset('images/icons/tambah.png') }}" alt="Plus Icon" class="plus-icon">
                        New Journal
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('journal.index') }}" class="sidebar-link">
                        <img src="{{ asset('images/icons/view.png') }}" alt="Pencil Icon" class="pencil-icon">
                        View All Journal
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content fade-in">
    <form action="{{ route('journal.store') }}" method="POST">
        @csrf
        <div class="content-header">
            <input type="text" name="judul" class="page-title" placeholder="Title" required />
            <button type="submit" class="save-button">Save</button>
        </div>

        <!-- Journal Writing Area -->
        <textarea name="isi" class="text-input" placeholder="What do you want to write today?" required></textarea>
    </form>
</main>
    </div>

   

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        @if (session('successs'))
            Swal.fire({
                title: 'Berhasil Dihapus🎉',
                text: 'Jadwal Berhasil Dihapus🙂',
                icon: 'success',
                confirmButtonText: 'Lanjut',
                background: '#fefefe',
                color: '#333',
                confirmButtonColor: '#4CAF50',
                backdrop: `rgba(0,0,0,0.5)`
            });
        @endif
        @if (session('succes'))
            Swal.fire({
                title: 'Berhasil Diperbarui🎉',
                text: 'Jadwal Berhasil Diperbarui🙂',
                icon: 'success',
                confirmButtonText: 'Lanjut',
                background: '#fefefe',
                color: '#333',
                confirmButtonColor: '#4CAF50',
                backdrop: `rgba(0,0,0,0.5)`
            });
        @endif
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil Ditambahkan 🎉',
                text: 'Journal Telah Ditambahkan 🤗',
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
                title: 'Gagal Ditambahkan 😢',
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
@endsection