@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_container_style.css') }}">
<link rel="stylesheet" href="{{ asset('css/event_detail_style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@section('content')
<div class="title-list-event">
    <h1 class="eventos-title">NOSSOS EVENTOS</h1>
</div>
    <div class="events-body">
        @if (empty($events) != true)
        @foreach ($events as $event)

        <div class="card-item">
            <a href="{{Route('event',[$event->id])}}" class="card-link">
                <img src="{{ $event->image_path }}" alt="" class="card-image">
                <p class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                <h2 class="card-title">{{ $event->name }}</h2>
                <button class="card-button material-symbols-outlined">arrow_forward</button>
            </a>
        </div>

    @endforeach
        @else
            <p>Não há eventos disponiveis.</p>
        @endif
    </div>
    <script src="{{ asset('js/home-page.js') }}"></script>
@endsection
