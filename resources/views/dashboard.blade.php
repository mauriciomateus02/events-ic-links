@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/dashboard_style.css') }}">


@section('content')

    <script src="{{ asset('js/script.js') }}"></script>

    @if (session('msg'))
        <p id="message" class="message">{{ session('msg') }}</p>
    @endif()

    <div class="dashboard-component-event">
        <div class="list-events-dashboard">
            <h1>Meus eventos cadastrados</h1>
            @if ($events->isEmpty())
                <p>Você ainda não criou nenhum evento</p>
            @else
                <table class="list-events">
                    <thead>
                        <th>Nome</th>
                        <th>Local</th>
                        <th>Data</th>
                        <th>Público</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr style="text-align: start;">
                                <td>{{ $event->name }}</td>

                                <td>{{ $event->city }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                                <td>{{ count($event->users) . ' ' . '/' . ' ' . $event->max_capacity }}</td>
                                <td class="button-action-list-event">
                                    <form action="/event/edit/{{ $event->id }}" method="GET">
                                        @csrf
                                        <button type="submit" class="dashboard-action-update"><x-icons.clipboard-list
                                                style="width: 25px; margin-right: 3px; color: black" /></button>
                                    </form>
                                    <form action="/event/{{ $event->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="dashboard-action-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $event->id }}"><x-icons.trash
                                                style="width: 25px; margin-right: 3px; color: black" /></button>

                                        <div class="modal fade" id="deleteModal-{{ $event->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar
                                                            Evento</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja realmente cancelar seu evento:
                                                        {{ $event->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">NÃO</button>
                                                        <button type="submit" class="btn btn-primary">SIM</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="list-events-dashboard">
            <h1>Minhas inscrições</h1>
            @if ($eventsUser->isEmpty())
                <p>Você ainda não se inscreveu em nenhum evento</p>
            @else
                <table class="list-events">

                    <thead>
                        <th>Nome</th>
                        <th>Local</th>
                        <th>Data</th>
                        <th>Preço</th>
                        <th>ações</th>
                    </thead>
                    <tbody>

                        @foreach ($eventsUser as $eventUser)
                            <tr style="text-align: start; border-bottom: 1px solid">
                                <td>{{ $eventUser->name }}</td>
                                <td>{{ $eventUser->city }}</td>
                                <td>{{ \Carbon\Carbon::parse($eventUser->date)->format('d/m/Y') }}</td>
                                <td>R$ {{ $eventUser->price }}</td>
                                <td class="button-action-list-event">
                                    <form action="/event/leave/{{ $eventUser->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="dashboard-action-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $eventUser->id }}"><x-icons.trash
                                                style="width: 25px; margin-right: 3px; color: black" /></button>
                                        <div class="modal fade" id="deleteModal-{{ $eventUser->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar
                                                            inscrição</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja realmente cancelar sua inscrição no evento:
                                                        {{ $eventUser->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">NÃO</button>
                                                        <button type="submit" class="btn btn-primary">SIM</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
    <script src="{{ asset('js/home-page.js') }}"></script>
@endsection()
