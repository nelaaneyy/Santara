@extends('layouts.app')
@section('title', 'Beauty Planner')

@section('content')
    <div class="beauty-planner-page-content">
        <div class="page-title-section">
            <h2>BEAUTY PLANNER</h2>
            <p>Tingkatkan kecantikanmu 1% per - harinya, dengan beauty planner</p>
        </div>
        @auth
            <form action="{{ route('beauty-planners.store') }}" method="POST" class="add-new-planner">
                @csrf
                <input type="text" name="activity" placeholder="Add New..." class="add-new-input" required>

                <div class="date-input-wrapper">
                    <span class="calendar-icon">
                        <img src="{{ asset('images/icons/calendar.png') }}" alt="Calendar">
                    </span>
                    <input type="date" name="scheduled_at" class="styled-date-input" required>
                </div>
            @endauth

            <button type="submit" class="add-button">ADD</button>
        </form>


        <div class="planner-controls">
            <div class="sort-dropdown">
                <span>Sort</span>
                <select name="sort" id="sortSelect">
                    <option value="added_date">Added Date</option>
                    <option value="due_date">Due Date</option>
                    <option value="alphabetical">Alphabetical</option>
                </select>

            </div>
            {{-- <div class="view-icons">
                <button class="icon-button"
                    style="background: transparent; border: none; padding: 0; margin: 0; outline: none; box-shadow: none; cursor: pointer;"><img
                        src="{{ asset('images/icons/modify.png') }}" alt="List View"></button>
            </div> --}}
        </div>

        <div class="plan-list" id="plannerList">
            @include('planner-list', ['planners' => $planners])
        </div>


    </div>
    {{-- belum --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.task-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const id = this.getAttribute('data-id');

                    fetch(`/beauty-planner/${id}/toggle`, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Toggled is_done:', data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>

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
                text: 'Jadwal Telah Ditambahkan 🤗',
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('sortSelect').addEventListener('change', function() {
                const sortValue = this.value;

                fetch(`/beauty-planners/sort?sort=${sortValue}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('plannerList').innerHTML = html;
                        addCheckboxListeners(); // Re-bind checkbox after DOM update
                    })
                    .catch(error => {
                        console.error('Sort error:', error);
                    });
            });

            

            addCheckboxListeners(); // Initial binding
        });
    </script>

@endsection
