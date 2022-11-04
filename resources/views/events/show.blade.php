@extends('layouts.main')
@section('title', 'HDC Events | Produtos')
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="imagem-container" class="col-md-6">
                <img class="img-fluid" src="/img/events/{{$event->imagem}}" alt="{{$event->titulo}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->titulo}}</h1>
                <div id="outline">
                    <p class="event-city">
                        <ion-icon name="location-outline"></ion-icon>{{$event->local}}</p>
                    <p class="events-participantes">
                        <ion-icon name="people-outline"></ion-icon>{{count($event->users)}}</p>
                </div>
                <p class="event-owner">
                    <ion-icon name="person-outline"></ion-icon>
                    Dono do Evento: {{$eventUser['name']}}</p>
                <p class="event-descricao col-md-12">{{$event->descricao}}</p>
                @if(!$hasUserJoined)
                    <form action="/events/join/{{$event->id}}" method="POST">
                        @csrf
                        <a href="/events/join/{{$event->id}}" class="btn btn-primary" id="event-submit"
                           onclick="event.preventDefault();
                    this.closest('form').submit();"
                        >Confirmar Presença</a>
                    </form>
                @else
                    <p class="already-joined-msg">Já está participando do evento</p>
                @endif
                @foreach(json_decode($event->itens) as $item)
                    <li>
                        <ion-icon name="play-outline"></ion-icon>
                        <span>{{$item}}</span></li>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Formulário de comentário --}}
    <div class="col-md-6 offset-md-3" id="coment-create-container">
        <div class="row cabecalho">
            <div class="col-md-12 text-center">
                <h2 class="titulo">Seção de comentários:</h2>
                @foreach($comments as $comment)
                    {{$comments[0]['comentario']}}
                @endforeach
            </div>
        </div>


        <form action="/events/{id}" method="POST" enctype="multipart/form-data" style="margin-bottom:.5em;">
            @csrf
            <div class="form-group">
                <label for="comentario" class="form-label">Comentário:</label><br>
                <textarea name="comentario" id="comentario" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mt-4 text-center">
                <input type="submit" class="btn btn-primary" value="Comentar">
            </div>
        </form>
    </div>
@endsection
