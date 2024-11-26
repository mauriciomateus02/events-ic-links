@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_container_style.css') }}">
<link rel="stylesheet" href="{{ asset('css/slide-events.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                        <h1 class="font-titulo">EVENTOS POPULARES</h1>
                        <hr class="linha">
                    </div>
                    @if (!is_null($events))
                        <div class="container-events">
                            <div class="swiper-container swiper1">
                                <div class="swiper-wrapper">
                                    @foreach ($events as $event)
                                        <div class="swiper-slide">
                                            <div class="card-item">
                                                <a href="{{Route('event',[$event->id])}}" class="card-link">
                                                    <img src="{{ $event->image_path }}" alt="" class="card-image">
                                                    <p class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                                                    <h2 class="card-title">{{ $event->name }}</h2>
                                                    <button class="card-button material-symbols-outlined">arrow_forward</button>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="swiper-pagination position-pagination swiper-pagination1"></div>
                                <!-- Botões de navegação -->
                                <div class="swiper-button-next swiper-button-next1"></div>
                                <div class="swiper-button-prev swiper-button-prev1"></div>
                                <!-- Paginação -->
                            </div>
                        </div>
                    @else
                        <p>Não há eventos</p>
                    @endif
                    <div class="title-list-event">
                        <h1 class="font-titulo">ACONTECENDO HOJE</h1>
                        <hr class="linha">
                    </div>
                    @if (!is_null($events_today))
                    <div class="container-events">
                        <div class="swiper-container swiper2">
                            <div class="swiper-wrapper">
                                @foreach ($events_today as $event)
                                    <div class="swiper-slide">
                                        <div class="card-item">
                                            <a href="{{Route('event',[$event->id])}}" class="card-link">
                                                <img src="{{ $event->image_path }}" alt="" class="card-image">
                                                <p class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                                                <h2 class="card-title">{{ $event->name }}</h2>
                                                <button class="card-button material-symbols-outlined">arrow_forward</button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="swiper-pagination position-pagination swiper-pagination2"></div>
                            <!-- Botões de navegação -->
                            <div class="swiper-button-next  position-button swiper-button-next2"></div>
                            <div class="swiper-button-prev  position-button swiper-button-prev2"></div>
                            <!-- Paginação -->
                        </div>
                    </div>
                    @else
                        <p>Não há eventos</p>
                    @endif
                @else
                <div class="title-list-event">
                    <h1 class="font-titulo">EVENTOS POPULARES</h1>
                    <hr class="linha">
                </div>
                @if (!is_null($events))
                    <div class="container-events">
                        <div class="swiper-container swiper1">
                            <div class="swiper-wrapper">
                                @foreach ($events as $event)
                                    <div class="swiper-slide">
                                        <div class="card-item">
                                            <a href="{{Route('event',[$event->id])}}" class="card-link">
                                                <img src="{{ $event->image_path }}" alt="" class="card-image">
                                                <p class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                                                <h2 class="card-title">{{ $event->name }}</h2>
                                                <button class="card-button material-symbols-outlined">arrow_forward</button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="swiper-pagination position-pagination swiper-pagination1"></div>
                            <!-- Botões de navegação -->
                            <div class="swiper-button-next swiper-button-next1"></div>
                            <div class="swiper-button-prev swiper-button-prev1"></div>
                            <!-- Paginação -->
                        </div>
                    </div>
                @else
                    <p>Não há eventos</p>
                @endif
                <div class="title-list-event">
                    <h1 class="font-titulo">ACONTECENDO HOJE</h1>
                    <hr class="linha">
                </div>
                @if (!is_null($events))
                <div class="container-events">
                    <div class="swiper-container swiper2">
                        <div class="swiper-wrapper">
                            @foreach ($events as $event)
                                <div class="swiper-slide">
                                    <div class="card-item">
                                        <a href="{{Route('event',[$event->id])}}" class="card-link">
                                            <img src="{{ $event->image_path }}" alt="" class="card-image">
                                            <p class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                                            <h2 class="card-title">{{ $event->name }}</h2>
                                            <button class="card-button material-symbols-outlined">arrow_forward</button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="swiper-pagination position-pagination swiper-pagination2"></div>
                        <!-- Botões de navegação -->
                        <div class="swiper-button-next  position-button swiper-button-next2"></div>
                        <div class="swiper-button-prev  position-button swiper-button-prev2"></div>
                        <!-- Paginação -->
                    </div>
                </div>
                @else
                    <p>Não há eventos</p>
                @endif

                @endif
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/slide-events.js') }}"></script>
    <script src="{{ asset('js/home-page.js') }}"></script>


@endsection()
