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
                    <input type="file" name="thumbnail" id="input-file-now-custom-3"
                        value="{{ asset('storage/eventos/') }}/{{ $event->thumbnail ?? old('thumbnail') }}"
                        class="dropify" data-height="200" />
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
        {{-- <div class="mb-3 row ">
            <div id="map" style="height: 365px;">
            </div>
            <div class="col-sm-12">

                <script async
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDImK3Vn_VFqziks0xvIN9Yy22VWJ7DDE4&callback=initMap"></script>
            </div>
            <div class="col-sm-6">
                <label for="example-datetime-local-input" class="col-sm-12 form-label">Localização Mapa </label>
                <div class="col-sm-12">
                    <input name="location_map" class="form-control" placeholder="-14.00000, -55.00000" type="text"
                        value="{{ $event->location_map ?? old('location_map') }}" id="location_map">
                </div>
            </div>
        </div> --}}
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
<hr>
<div class="row">
    <h2>Configuração do Formulário</h2>
    <br>
    <div class="col-6">

        @foreach ($fieldForm as $key => $value)
            <div class="checkbox my-2">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input ckd" {{ $value['default'] }}
                        {{ $value['checked'] }} name="{{ $key }}" data-parsley-multiple="groups"
                        data-parsley-mincheck="2">
                    <label class="form-check-label" for="customCheck02">{{ $value['title'] }}</label>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-6">
        <div class="card card-body">
            <h4 class="car-title">Modelo Formulário de Inscrição</h4>
            <div class="col-10 m-lg-3">
                @foreach ($fieldForm as $key => $value)
                    <div class="mb-3 row" id="lbl_{{ $key }}">
                        <label for="example-text-input" class="col-sm-4 form-label">{{ $value['title'] }}</label>
                        <input class="form-control" type="{{ $value['type'] }}" name="{{ $key }}"
                            id="form_{{ $key }}" placeholder="{{ $value['title'] }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="mb-4">
    <hr>
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
    <script>
        $(document).ready(function() {

            var arr = [];
            $(".ckd").each(function(item) {
                arr.push($(this).attr("id"));
            });

            quant = arr.length

            for (i = 0; i < quant; i++) {

                if ($("#" + arr[i]).is(':checked') == false) {
                    $("#form_" + arr[i]).hide();
                    $("#lbl_" + arr[i]).hide();
                }

            }


        });
    </script>
    {{-- <script>
        latlong = "-15.5712756,-56.0760608";

        splitlocalizacao = latlong.split(",");
        latitude = splitlocalizacao[0];
        longitude = splitlocalizacao[1];

        function initMap() {

            const myLatlng = {
                lat: parseFloat(latitude),
                lng: parseFloat(longitude)
            };
            const matogrosso = {
                lat: -12.6467812,
                lng: -60.4242536
            };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: myLatlng,
            });
            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Local do Evento",
                position: myLatlng,
            });


            infoWindow.open(map);

            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                infoWindow.setContent(
                    "Propriedade"
                );


                posicao = JSON.parse(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2))
                lat1 = posicao["lat"]
                lng1 = posicao["lng"]

                document.getElementById("location_map").value = lat1 + "," + lng1;

                infoWindow.open(map);
            });
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    </script> --}}
@endsection
