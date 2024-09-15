@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_style.css') }}">
@section('content')

<div class="event-create-container">
    <h1>Crie seu evento</h1>
    <form action="/event" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" id="name" name="name" placeholder="Nome do Evento">
            <label for="title">Cidade:</label>
            <input type="text" id="city" name="city" placeholder="Cidade que ocorrerá o evento">
            <label for="title">Publico Maximo:</label>
            <input type="number" id="max_capacity" name="max_capacity" placeholder="Quantidade máxima de pessoas" step="1" min="0" required>
            <label for="title">Valor:</label>
            <input type="number" id="price" name="price" placeholder="Quantidade máxima de pessoas">
            <label for="title">Data:</label>
            <input type="date" id="date" name="date">
            <label for="title">Imagem:</label>
            <input type="file" id="image" name="image">
            <label for="title">Oferta:</label>
            <div class="form-group-event">
                <input id="item" type="checkbox" name="items[]" value="open bar"> Open bar
                <input id="item" type="checkbox" name="items[]" value="Open food"> Open food
                <input id="item" type="checkbox" name="items[]" value="live music"> live music
                <input id="item" type="checkbox" name="items[]" value="karaoke"> karaoke
            </div>
            <label for="title">Descrição:</label>
            <textarea type="textarea" id="description" name="description" placeholder="o que terá no evento"></textarea>
            <input type="submit" value="Criar Evento" class="submit">
        </div>
    </form>
</div>

@endsection()