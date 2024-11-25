@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_detail_style.css') }}">

@section('content')
<div class="events-details-page">
    <div class="container-event-details">
        <img id="image-event-detail" src="../{{$event->image_path}}">
        <ul class="list-event-detail">
            <li class="component-list-event-detail" id="title-list-event-detail">
                <h1 class="title-event-detail">{{$event->name}}</h1>
            </li>
            <li class="component-list-event-detail">
                <x-icons.star style="width: 25px; margin-right: 3px; color: #fac753;" />
                <p class="component-text-event-detail">{{$user->name}}</p>
            </li>
            <li class="component-list-event-detail">
                <x-icons.location-marker style="width: 25px; margin-right: 3px; color: #fac753;" />
                <p class="component-text-event-detail">{{$event->city}}</p>
            </li>
            <li class="component-list-event-detail">
                <x-icons.currency-dollar style="width: 25px; margin-right: 3px; color: #fac753;" />
                <p class="component-text-event-detail"> {{$event->price}}</p>
            </li>
            <li class="component-list-event-detail">
                <x-icons.clipboard-list style="width: 25px; margin-right: 3px; color: #fac753;" />
                <p class="component-text-event-detail">{{$event->max_capacity-count($event->users)}} vagas</p>
            </li>
            @if(empty($event->items) != TRUE)
            <li class="component-list-event-detail">
                <x-icons.sparkles style="width: 25px; margin-right: 3px; color: #fac753;" />
                @foreach($event->items as $item)
                <p class="component-text-event-detail">{{$item}}.</p>
                @endforeach()
            </li>
            @endif
            <li class="component-list-event-detail">
                <x-icons.annotation style="width: 25px; margin-right: 3px; color: #fac753;" />
                <p class="component-text-event-detail">{{$event->description}}</p>
            </li>
            <form class="form-group" action="/event/buy/{{$event->id}}" method="POST">
                @csrf
                <button id="reservButton" class="submit">Reservar Vaga</button>
            </form>

        </ul>
    </div>
    <!-- Passa os valores para o script JS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var price = {{ $event->max_capacity }};
            var quant = {{ count($event->users) }};
            var reservButton = document.getElementById('reservButton');

            if (price - quant === 0) {
                reservButton.disabled = true;
                reservButton.style.backgroundColor = 'rgb(187, 187, 187)';

            }
        });
    </script>

    <!-- Link para o arquivo JS externo -->
    <script src="{{ asset('js/event.js') }}"></script>

</div>

</div>
@endsection
