@extends('sys.template.main')

@section('title', 'Detalhes do Post')

@section('content')
    <h1>Detalhes do Post {{ $event->title }}</h1>

    <ul>
        <li><strong>Título: </strong>{{ $event->title }}</li>
        <li><strong>Conteúdo: </strong>{{ $event->description }}</li>
    </ul>

    <form action="{{ route('events.destroy', $event->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Deseja excluir este evento?</button>
    </form>
@endsection
