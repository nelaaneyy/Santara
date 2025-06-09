@extends('layouts.app')
@section('title', 'Beauty Planner')

@section('content')
<div class="beauty-planner-page-content">
    <div class="page-title-section">
        <h2>BEAUTY PLANNER</h2>
        <p>Tingkatkan kecantikanmu 1% per - harinya, dengan beauty planner</p>
    </div>

    <div class="add-new-planner">
        <input type="text" placeholder="Add New..." class="add-new-input">
        <button class="icon-button"><img src="{{ asset('images/icons/calendar.png') }}" alt="Calendar"></button>
        <button class="add-button">ADD</button>
    </div>

    <div class="planner-controls">
        <div class="sort-dropdown">
            <span>Sort</span>
            <select>
                <option value="added_date">Added Date</option>
                <option value="due_date">Due Date</option>
                <option value="alphabetical">Alphabetical</option>
            </select>
        </div>
        <div class="view-icons">
            <button class="icon-button"><img src="{{ asset('images/icons/list-view.png') }}" alt="List View"></button>
            <button class="icon-button"><img src="{{ asset('images/icons/grid-view.png') }}" alt="Grid View"></button>
        </div>
    </div>

    <div class="plan-list">
        {{-- Example Plan Item 1 --}}
        <div class="plan-item">
            <input type="checkbox" class="task-checkbox">
            <span class="task-name">Skincare pagi</span>
            <div class="task-actions">
                <button class="icon-button more-options">...</button>
                <button class="icon-button"><img src="{{ asset('images/icons/edit.png') }}" alt="Edit"></button>
                <button class="icon-button"><img src="{{ asset('images/icons/delete.png') }}" alt="Delete"></button>
            </div>
            <div class="task-date">
                <img src="{{ asset('images/icons/clock.png') }}" alt="Time">
                <span>28 Jun 2025</span>
            </div>
        </div>

        {{-- Example Plan Item 2 (Duplicate for demonstration) --}}
        <div class="plan-item">
            <input type="checkbox" class="task-checkbox">
            <span class="task-name">Skincare pagi</span> {{-- Or 'Skincare malam' for a different example --}}
            <div class="task-actions">
                <button class="icon-button more-options">...</button>
                <button class="icon-button"><img src="{{ asset('images/icons/edit.png') }}" alt="Edit"></button>
                <button class="icon-button"><img src="{{ asset('images/icons/delete.png') }}" alt="Delete"></button>
            </div>
            <div class="task-date">
                <img src="{{ asset('images/icons/clock.png') }}" alt="Time">
                <span>28 Jun 2025</span> {{-- Or '29 Jun 2025' --}}
            </div>
        </div>

        {{-- Example Plan Item 3 (Duplicate for demonstration) --}}
        <div class="plan-item">
            <input type="checkbox" class="task-checkbox">
            <span class="task-name">Skincare pagi</span> {{-- Or 'Makeup Routine' --}}
            <div class="task-actions">
                <button class="icon-button more-options">...</button>
                <button class="icon-button"><img src="{{ asset('images/icons/edit.png') }}" alt="Edit"></button>
                <button class="icon-button"><img src="{{ asset('images/icons/delete.png') }}" alt="Delete"></button>
            </div>
            <div class="task-date">
                <img src="{{ asset('images/icons/clock.png') }}" alt="Time">
                <span>28 Jun 2025</span> {{-- Or '30 Jun 2025' --}}
            </div>
        </div>
    </div>
</div>
@endsection