@extends('sys.template.main')

@section('titulo', 'Editando: ' . $event->title)

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <h5 class="card-title">Cadastro do Evento</h5>
                                    <form action="{{ route('events.update', $event->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        @include('sys.events.partials.event_form')
                                    </form>
                                </div>

                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection
