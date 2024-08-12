<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    @yield('assets_css')

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <title>Sistema de Eventos</title>

    <script type="text/javascript">
        function navToShow() {
            window.location.href = '{{ route('events.index') }}';
        }
    </script>

</head>

<body>


    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sistema de Eventos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <section class="section">
            <div class="page-content container">

                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-md-4">
                            <div class="card card-body">

                               <img src="{{ asset('storage/eventos/') }}/{{ $event->thumbnail }}"
                                alt="img event" class="card-img-top img-fluid">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $event->title }}</h4>
                                    <p class="card-text text-muted font-size-13">{{ $event->description }}</p>
                                </div>
                                <a onclick="navToShow()" class="btn btn-primary">Inscreva-se</a>

                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </section>


    </main>



</body>



</html>
