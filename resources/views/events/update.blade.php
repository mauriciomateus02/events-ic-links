@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_style.css') }}">
@section('content')
    <div class="event-create-container">
        <h1>Atualizando Evento: {{ $event->name }}</h1>
        <form action="/event/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" id="name" name="name" placeholder="Nome do Evento" value="{{ $event->name }}">
                <label for="title">Cidade:</label>
                <input type="text" id="city" name="city" placeholder="Cidade que ocorrerá o evento"
                    value="{{ $event->city }}">
                <label for="title">Publico Maximo:</label>
                <input type="number" id="max_capacity" name="max_capacity" placeholder="Quantidade máxima de pessoas"
                    value="{{ $event->max_capacity }}" step="1" min="0" required>
                <label for="title">Valor:</label>
                <input type="number" id="price" name="price" placeholder="Quantidade máxima de pessoas"
                    value="{{ $event->price }}">
                <label for="title">Data:</label>
                <input type="date" id="date" name="date"
                    value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}">
                <label for="title">Imagem:</label>
                <input type="file" id="image" name="image" value="{{ $event->name }}">
                <label for="title">Oferta:</label>
                <div class="form-group-event">
                    <input id="item" type="checkbox" name="items[]" value="open bar"> Open bar
                    <input id="item" type="checkbox" name="items[]" value="Open food"> Open food
                    <input id="item" type="checkbox" name="items[]" value="live music"> live music
                    <input id="item" type="checkbox" name="items[]" value="karaoke"> karaoke
                </div>
                <label for="title">Descrição:</label>
                <textarea type="textarea" id="description" name="description" placeholder="o que terá no evento">{{ $event->description }}</textarea>
                <input type="button" value="Editar Evento" class="submit" data-bs-toggle="modal" data-bs-target="#update-{{ $event->id }}">
            </div>
            <div class="modal fade" id="update-{{ $event->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar
                                Evento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deseja realmente Editar seu evento:
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
    </div>
@endsection()
