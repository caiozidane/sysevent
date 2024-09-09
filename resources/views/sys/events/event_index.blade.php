@extends('sys.template.main')

@section('titulo', 'Eventos')

@section('content')

    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="button-items">
                        <a href="{{ URL::route('events.create') }}" class="btn btn-primary">Novo</a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Evento</th>
                                    <th>Publicado</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td> <img src="{{ asset('storage/eventos/') }}/{{ $event->thumbnail }}"
                                                width="100px" alt="" class="src"> </td>
                                        <td>{{ $event->title }}</td>
                                        <td align="center">
                                            @if ($event->publish_events == 1)
                                                <span class="badge bg-success">ativo</span>
                                            @else
                                                <span class="badge bg-danger">inativo</span>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if ($event->situation == 1)
                                                <h3><i title="Evento Publicado" class="mdi mdi-publish text-info"></i></h3>
                                            @else
                                                <h3><i title="Evento Publicado"
                                                        class="fas fa-exclamation-triangle text-warning"></i></h3>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('events.edit', $event->id) }}"
                                                class="btn btn-outline-secondary edit"><i
                                                    class="fas fa-edit "></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                                            <a href="{{ route('events.destroy', $event->id) }}"
                                                class="btn btn-outline-danger "><i class="far fa-trash-alt "><input
                                                        value="{{ $event->id }}" type="hidden" name="_method"
                                                        value="DELETE"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
