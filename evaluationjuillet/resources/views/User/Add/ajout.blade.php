<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ajout {{$titre}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}" id="darkTheme">
</head>
<body class="vertical dark ">
    <div class="wrapper">

        @include('Header.HeaderUser')

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Ajout @php echo($titre) @endphp / <a href="/PatientActe">Revenir</a></h2>
                        <p class="text-muted"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <form action="/@php echo($url) @endphp" method="POST" enctype="multipart/form-data">
                                            @csrf


                                        @php
                                        if($titre == "facture") {
                                        @endphp
                                        <input type="hidden" name="idpatient" class="form-control" value="{{$i}}">
                                        <div class="form-group mb-3">
                                            <label>Date</label>
                                            <input type="datetime-local" name="datefacture" value="{{date('Y-m-d H:i:s')}}" class="form-control">
                                        </div>
                                        @php
                                            }
                                        @endphp

                                        @php
                                        if($titre == "CSV fichier") {
                                        @endphp
                                            
                                        @if(session('succes'))
                                        <div class="col-12 mb-4">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{session('succes')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group mb-3">
                                            <label>importer un fichier CSV</label>
                                            <input type="file" name="csv" class="form-control">
                                        </div>
                                        @php
                                            }
                                        @endphp
                                        

                                        @php
                                        if($titre == "acte pour un patient") {
                                        @endphp
                                        <br>
                                        <button class="btn btn-success"><a href="/genererPDF/{{$idfacture}}">Valider et Exporter PDF</a></button>
                                        <br>
                                        
                                        <input type="hidden" name="idpatient" class="form-control" value="{{$idpatient}}">
                                        <input type="hidden" name="idfacture" class="form-control" value="{{$idfacture}}">
                                        <div class="form-group mb-3">
                                            <label for="custom-select1">Acte</label>
                                            <select class="custom-select" name="idacte" id="custom-select1">
                                              @foreach ($actes as $acte)
                                                <option value="{{ $acte->id }}">{{ $acte->nom }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Prix</label>
                                            <input type="number" step="any" name="prix" class="form-control" value="0">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Date</label>
                                            <input type="datetime-local" name="dateheure" class="form-control">
                                        </div>

                                        @php
                                            }
                                        @endphp

                                        @php
                                        if($titre == "prix acte depense") {
                                        @endphp

                                        <div class="form-group mb-3">
                                            <label for="custom-select1">Acte</label>
                                            <select class="custom-select" name="iddepense" id="custom-select1">
                                              @foreach ($depense as $depenses)
                                                <option value="{{ $depenses->id }}">{{ $depenses->nom }}</option>
                                              @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Prix</label>
                                            <input type="number" step="any" name="prix" value="0" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Jour</label>
                                            <input type="number" name="jour" min="1" max="31" placeholder="Jour" required class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Mois : </label>
                                        @for ($month = 1; $month <= 12; $month++)
                                            @if ($month % 2 == 1)
                                                <div>
                                            @endif
                                            <label>
                                                <input type="checkbox" name="mois[]" value="{{ $month }}" class="custom"> {{ \Carbon\Carbon::parse('2023-' . $month . '-01')->formatLocalized('%B') }}
                                            </label>
                                            @if ($month % 2 == 0 || $month == 12)
                                                </div>
                                            @endif
                                        @endfor
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Année </label>
                                            <input type="number" name="annee" max="2099" placeholder="Année" class="form-control" required>
                                        </div>

                                        @php
                                            }
                                        @endphp

                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('assets/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/apps.js') }}"></script>

    <script>
        var inputsCategorie = document.querySelectorAll('[name^="place_"]');
        inputsCategorie.forEach(function(input) {
            input.addEventListener('change', calculerSomme);
        });
        function calculerSomme() {
            var somme = 0;
            inputsCategorie.forEach(function(input) {
                somme += parseFloat(input.value) || 0;
            });
            var inputPlace = document.getElementById('totalPlace');
            inputPlace.value = somme;
        }
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>
</html>