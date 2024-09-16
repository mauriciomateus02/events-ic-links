@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_container_style.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@section('content')
<div class="events">
    @if(empty($events) != TRUE)
    @foreach($events as $event)
    <div class="container-card">
        <img src="{{$event->image_path}}">
        <p>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
        </p>
        <p>{{$event->name}}</p>
        {{-- <a href="/event/{{$event->id}}">Saiba Mais</a> --}}
        <button class="card-button material-symbols-outlined">arrow_forward</button>
    </div>
    @endforeach
    @endif
</div>
@endsection
