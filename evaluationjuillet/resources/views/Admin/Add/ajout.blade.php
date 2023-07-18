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

        @include('Header.HeaderAdmin')

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="page-title">Ajout @php echo($titre) @endphp</h2>
                        <p class="text-muted"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <form action="/@php echo($url) @endphp" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @php
                                            if($titre == "patient") {
                                            @endphp
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nom</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Date de naissance</label>
                                                    <input type="date" name="dtn" class="form-control"  max="{{date('Y-m-d')}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="custom-select1">Genre</label>
                                                <select class="custom-select" name="idgenre" id="custom-select1">
                                                    @foreach ($genre as $genres)
                                                    <option value="{{ $genres->id }}">{{ $genres->nom }}</option>
                                                    @endforeach
                                                </select>
                                             </div>
                                             <label>Remboursement</label>
                                             <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" value="1" name="remboursement" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">OUI</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" value="0" name="remboursement" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">NON</label>
                                            </div>
                                            </br>
                                            </br>
                                            @php
                                            }
                                            @endphp

                                            @php
                                            if($titre == "acte") {
                                            @endphp
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nom</label>
                                                        <input type="text" name="nom" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Budget</label>
                                                        <input type="number" step="any" name="budget" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>CODE</label>
                                                        <input type="text" name="code" maxlength="3" class="form-control" required>
                                                    </div>
                                                </div>
                                            @php
                                            }
                                            @endphp

                                            @php
                                            if($titre == "depense") {
                                            @endphp
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nom</label>
                                                        <input type="text" name="nom" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Budget</label>
                                                        <input type="number" step="any" name="budget" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>CODE</label>
                                                        <input type="text" name="code" maxlength="3" class="form-control" required>
                                                    </div>
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