@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_container_style.css') }}">

@section('content')
<div class="events">
    @if(empty($events) != TRUE)
    @foreach($events as $event)
    <div class="container">
        <img src="{{$event->image_path}}">
        <p class="date">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
        </p>
        <p class="name_event">{{$event->name}}</p>
        <a href="/event/{{$event->id}}">Saiba Mais</a> 
    </div>
    @endforeach
    @endif
</div>
@endsection