@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-6">
        <div class="mb-3 row">
            <div class="col-lg-12  mo-b-15">
                <input class="form-control" type="text" name="title" value="{{ $event->title ?? old('title') }}"
                    placeholder="Título">
            </div>
        </div>

        <div class="mb-3">
            <textarea name="description" id="description" class="form-control" rows="20" placeholder="Descrição">{{ $event->description ?? old('description') }}</textarea>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-3">
                <label class="col-sm-12 form-label">Data
                    Início</label>
                <div class="col-sm-12">
                    <input name="datetime_begin"
                        value="{{ $event->datetime_begin ?? old('datatime_begin') }}"class="form-control"
                        type="datetime-local">
                </div>
            </div>
            <div class="col-sm-3">
                <label class="col-sm-12 form-label">Data
                    Fim</label>
                <input name="datetime_end"
                    value="{{ $event->datetime_end ?? old('datatime_begin') }}"class="form-control"
                    type="datetime-local">
            </div>
        </div>

        <div class="mb-3 row ">
            <div class="col-sm-3">
                <label class="col-sm-12 form-label">Telefone </label>
                <div class="col-sm-12">
                    <input name="phone" value="{{ $event->phone ?? old('phone') }}"class="form-control"
                        type="tel">
                </div>
            </div>
            <div class="col-sm-9">
                <label class="col-sm-12 form-label">E-mail</label>
                <input class="form-control" type="email" name="mail" value="{{ $event->mail ?? old('mail') }}">
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Foto</h5>
                    <input type="file" name="thumbnail" id="input-file-now-custom-3" class="dropify"
                        data-height="200" />
                </div>
            </div>
        </div>
        <div class="mb-3 row ">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label for="country_address"></label>
                    <input class="form-control" type="text" name="country_address"
                        value="{{ $event->country_address ?? old('country_address') }}" placeholder="Endereço">
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <fieldset>
            <label for="" class="mb-3">
                <h2>Tickets de Inscrições</h2>
            </label>
            <div class="repeater-custom-show-hide mb-3">
                <div data-repeater-list="car" class="mb-3">
                    <div data-repeater-item="">
                        <div class="mb-3 row  d-flex align-items-end">

                            <div class="col-sm-4">
                                <label class="form-label">Model</label>
                                <input type="text" name="car[0][model]" value="" class="form-control">
                            </div>

                            <div class="col-sm-1">
                                <span data-repeater-delete="" class="btn btn-danger btn-sm my-1">
                                    <span class="fa fa-times me-1"></span> Excluir
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <span data-repeater-create="" class="btn btn-light me-3">
                            <span class="fa fa-plus me-1"></span> Novo
                        </span>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </fieldset>
    </div>
</div>

<button type="submit" class="btn btn-primary w-lg mt-2">Salvar</button>


@section('assets_js')
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>

    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-repeater.init.js') }}"></script>
@endsection
