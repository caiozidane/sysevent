@extends('sys.template.main')

@section('titulo', 'Eventos')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <h2>Cadastro do Eventos</h2>
                                    <br>
                                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
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


@section('assets_js')
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>

    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>
@endsection


@endsection
