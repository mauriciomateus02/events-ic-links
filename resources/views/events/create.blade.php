@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/event_style.css') }}">
@section('content')

<div class="event-create-container">
    <h1>CRIE SEU EVENTO</h1>
    <form action="/event" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" id="name" name="name" placeholder="Nome do Evento" required>
            <label for="title">Local:</label>
            <input type="text" id="city" name="city" placeholder="Cidade que ocorrerá o evento" required>
            <label for="title">Publico Máximo:</label>
            <input type="number" id="max_capacity" name="max_capacity" placeholder="Quantidade máxima de pessoas" step="1" min="0" required>
            <label for="title">Valor:</label>
            <input type="number" id="price" name="price" placeholder="Preço por pessoa" required>
            <label for="title">Data:</label>
            <input type="date" id="date" name="date" required>
            <label for="title">Imagem:</label>
            <input type="file" id="image" name="image" required>
            <label for="title">Oferta:</label>
            <div class="form-group-event">
                <input  id="item" type="checkbox" name="items[]" value="computacao"> Computação
                <input  id="item" type="checkbox" name="items[]" value="esporte"> Esporte
                <input  id="item" type="checkbox" name="items[]" value="musica"> Música
                <input  id="item" type="checkbox" name="items[]" value="mentoria"> Mentoria
                <input  id="item" type="checkbox" name="items[]" value="outros"> Outros
            </div>
            <label for="title">Descrição:</label>
            <textarea  type="textarea" id="description" name="description" placeholder="o que terá no evento" required></textarea>
            <input type="submit" value="Criar Evento" class="submit">
        </div>
    </form>
</div>

@endsection()
