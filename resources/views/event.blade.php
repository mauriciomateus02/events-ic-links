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
    <div class="filter-events">
        <div class="container-filter">
            Filtrar por:
            <form id='filter-event-type' action="{{ route('event.store') }}">
                <select class="filter" name="filtro_eventos" id="opcoes"
                    onchange="document.getElementById('filter-event-type').submit()">
                    <option value="" disabled selected>Escolha uma opção</option>
                    <option value="computacao">Computação</option>
                    <option value="esporte">Esporte</option>
                    <option value="musica">Música</option>
                    <option value="mentoria">Mentoria</option>
                    <option value="outros">Outros</option>
                </select>
            </form>
        </div>

        <div class="component-search">
            @if (empty($filter) != true)
                <div class="name_search">

                    <div class="text-search">
                        {{ $filter }}
                        <a href="{{ route('event.store') }}"><x-icons.x
                                style="width: 18px; margin-right: 3px; color: white" /></a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if (!empty($events))
        @if (!$events->isEmpty())
            <div class="events-body">
                @foreach ($events as $event)
                    <div class="card-item">
                        <a href="{{ Route('event', [$event->id]) }}" class="card-link">
                            <img src="{{ $event->image_path }}" alt="" class="card-image">
                            <p class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                            <h2 class="card-title">{{ $event->name }}</h2>
                            <button class="card-button material-symbols-outlined">arrow_forward</button>
                        </a>
                    </div>
                @endforeach

            </div>
        @else
            <div class="events-body-empty">
                <p class="not-found">Não há eventos disponiveis.</p>
            </div>
        @endif
    @else
        <div class="events-body-empty">
            <p class="not-found">Não há eventos disponiveis.</p>
        </div>
    @endif

    <script src="{{ asset('js/home-page.js') }}"></script>
@endsection
