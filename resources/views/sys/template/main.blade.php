<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />
    <title>@yield('titulo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema de Eventos da Aprosoja MT" name="description" />
    <meta content="Tecnologia da Informação e Projetos - Aprosoja MT" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    @yield('assets_css')

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark">
    <div id="layout-wrapper">


        @include('sys.template.header')

        @include('sys.template.menu')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">@yield('titulo')</h4>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            {{-- <script>
                                document.write(new Date().getFullYear())
                            </script> © Tecnologia da Informação. --}}
                        </div>
                        <div class="col-sm-6">
                            {{-- <div class="text-sm-end d-none d-sm-block">
                                feito por mim <i class="mdi mdi-heart text-danger"></i>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>



    <div class="rightbar-overlay"></div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    @yield('assets_js')

    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
