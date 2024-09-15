@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_container_style.css') }}">
@section('content')

    <script src="{{ asset('js/script.js') }}"></script>

    <div class="main-body">
        @if (session('msg'))
            <p id="message" class="message">{{ session('msg') }}</p>
        @endif()
        @if (session('err'))
            <p id="message" class="messageErr">{{ session('err') }}</p>
        @endif()
        <div class="home-page">
            <div class="component-search">
                @if (empty($search) != true)
                    <div class="name_search">
                        <p class="text-search-still">Buscando:</p>
                        <div class="text-search">
                            {{ $search }}
                            <a href="/"><x-icons.x style="width: 18px; margin-right: 3px; color: white" /></a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="events" style="margin-top: -20px;">
                @if (empty($search) == true)
                    <div class="title-list-event">
                        <h1 class="font-titulo">Eventos populares</h1>
                        <hr class="linha">
                    </div>
                    @if (!is_null($events))
                        <div class="container-slide">
                            @foreach ($events as $event)
                                <div class="container-card">
                                    <img src="{{ $event->image_path }}">
                                    <p class="date">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                                    </p>
                                    <p class="name_event">{{ $event->name }}</p>
                                    <a href="/event/{{ $event->id }}">Saiba Mais</a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Não há eventos</p>
                    @endif
                    <div class="title-list-event">
                        <h1 class="font-titulo">Acontecendo Hoje</h1>
                        <hr class="linha">
                    </div>
                    @if (is_null($events))
                        @foreach ($events as $event)
                            <div class="container">
                                <img src="{{ $event->image_path }}">
                                <p class="date">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                                </p>
                                <p class="name_event">{{ $event->name }}</p>
                                <a href="/event/{{ $event->id }}">Saiba Mais</a>
                            </div>
                        @endforeach
                    @else
                        <p>Não há eventos</p>
                    @endif
                @else
                    @if (is_null($events))
                        @foreach ($events as $event)
                            <div class="container">
                                <img src="{{ $event->image_path }}">
                                <p class="date">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                                </p>
                                <p class="name_event">{{ $event->name }}</p>
                                <a href="/event/{{ $event->id }}">Saiba Mais</a>
                            </div>
                        @endforeach
                    @else
                        <p>Não há eventos</p>
                    @endif
                @endif
            </div>

        </div>
    </div>
@endsection()
