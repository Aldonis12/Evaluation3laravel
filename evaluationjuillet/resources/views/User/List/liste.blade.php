<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste {{$titre}}</title>
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
                        <div class="row">
    
                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">Liste {{$titre}} </h2>
                                <div class="card shadow">
                                    <div class="card-body">

                                        @php
                                            if($var == "patient") {
                                        @endphp
                                                <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Date de naissance</th>
                                                    <th>Genre</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($patient as $patients)
                                                    <tr>
                                                        <td>{{ $patients->nom }}</td>
                                                        <td>{{ $patients->dtn }}</td>
                                                        <td>{{ $patients->Genre->nom }}</td>
                                                            <td>
                                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted sr-only">Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="/PageAjoutFacture/{{ $patients->id }}">Ajout acte</a>
                                                                    <a class="dropdown-item" href="/ListeActeParPatient/{{ $patients->id }}">Liste des actes</a>
                                                                    <a class="dropdown-item" href="/ListeFactureParPatient/{{ $patients->id }}">Liste des factures</a>
                                                                </div>
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $patient->links('Header.pagination') }}

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "acte par patient") {
                                        @endphp
                                            <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Acte</th>
                                                <th>Prix</th>
                                                <th>Date et Heure</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $prixTotal = 0;
                                            @endphp
                                            @foreach ($patientActes as $patientActe)
                                                <tr>
                                                    <td>{{ $patientActe->Acte->nom }}</td>
                                                    <td>{{ $patientActe->prix }}</td>
                                                    <td>{{ $patientActe->dateheure }}</td>
                                                    <td><div class="col-auto">
                                                            <a href="/PageModifierPatientActe/{{ $patientActe->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @php
                                            $prixTotal += $patientActe->prix;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="2">Somme des actes : {{ $prixTotal }} Ar</td>
                                            </tr>

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "facture par patient") {
                                        @endphp
                                            <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Facture</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($facture as $factures)
                                                <tr>
                                                    <td>{{ $factures->datefacture }}</td>
                                                    <td><a href="/DetailsFacture/{{$factures->id}}"><button type="button" class="btn mb-2 btn-outline-info">Voir details</button></a></td>
                                                </tr>
                                            @endforeach

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "prix depense") {
                                        @endphp
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Depense</th>
                                                        <th>CODE</th>
                                                        <th>Prix</th>
                                                        <th>Date</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($depenses as $depense)
                                                        <tr>
                                                            <td>{{ $depense->depense->nom }}</td>
                                                            <td>{{ $depense->depense->code }}</td>
                                                            <td>{{ $depense->prix }}</td>
                                                            <td>{{ $depense->inserted }}</td>
                                                            <td>
                                                                <div class="col-auto">
                                                            <a href="/PageModifierPrixDepense/{{ $depense->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                        </div>    
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <br>
                                            {{ $depenses->links('Header.pagination') }}
                                        @php
                                        }
                                        @endphp
                                        
                                        
                                        @php
                                        if($var == "des factures") {
                                        @endphp
                                            <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient</th>
                                                <th>Date facture</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($facture as $factures)
                                                <tr>
                                                    <td>{{ $factures->patient->nom }}</td>
                                                    <td>{{ $factures->datefacture }}</td>
                                                    <td><a href="/DetailsFacture/{{$factures->id}}"><button type="button" class="btn mb-2 btn-outline-info">Voir details</button></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                            </table>
                                            {{ $facture->links('Header.pagination') }}
                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "details factures") {
                                        @endphp
                                            <label><a href="/genererPDF/{{$i}}"><button type="button" class="btn mb-5 btn-secondary"><span class="fe fe-download fe-1"> Exporter au format pdf </span></button></a> <br> 
                                                Patient :<strong> {{ $patientacte[0]->patient->nom }} </strong>
                                        
                                                </label>
                                            <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Acte</th>
                                                <th>Prix</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total = 0;
                                            @endphp

                                            @foreach ($patientacte as $patientactes)
                                                <tr>
                                                    <td>{{ $patientactes->acte->nom }}</td>
                                                    <td>{{ $patientactes->prix }}</td>
                                                </tr>
                                            
                                            @php
                                            $total += $patientactes->prix;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="2">Somme : {{ $total }} Ar</td>
                                            </tr>
                                        </tbody>
                                            </table>
                                        @php
                                        }
                                        @endphp

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