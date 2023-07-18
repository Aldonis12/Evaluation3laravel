<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste {{$var}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}" id="darkTheme">
</head>
<style>
    .custom-markRecette {
  background-color: rgb(131, 219, 81);
  color: black;
    }
    .custom-markDepense {
  background-color: rgb(242, 173, 89);
  color: black;
    }
    .custom-markBenefice {
  background-color: rgb(4, 160, 250);
  color: black;
    }
</style>
<body class="vertical dark ">
    <div class="wrapper">

        @include('Header.HeaderAdmin')

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">Liste {{$var}}</h2>
                                <div class="card shadow">
                                    <div class="card-body">

                                        @php
                                            if($var == "patient") {
                                        @endphp
                                                <table class="table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Date de naissance</th>
                                                    <th>Genre</th>
                                                    <th>Remboursement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($patient as $patients)
                                                    <tr>
                                                        <td>{{ $patients->nom }}</td>
                                                        <td>{{ $patients->dtn }}</td>
                                                        <td>{{ $patients->Genre->nom }}</td>
                                                        <td>
                                                            @php if ($patients->remboursement<1){ @endphp
                                                            NON
                                                            @php } else if ($patients->remboursement >0) { @endphp
                                                            OUI
                                                            @php } @endphp
                                                            </td>
                                                        <td><div class="col-auto">
                                                            <a href="/PageModifierPatient/{{ $patients->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerPatient/{{ $patients->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $patient->links('Header.pagination') }}

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "acte") {
                                        @endphp
                                            <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>CODE</th>
                                                <th>Budget</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($actes as $Acte)
                                                <tr>
                                                    <td>{{ $Acte->nom }}</td>
                                                    <td>{{ $Acte->code }}</td>
                                                    <td>{{ $Acte->budget }}</td>
                                                    <td><div class="col-auto">
                                                            <a href="/PageModifierActe/{{ $Acte->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerActe/{{ $Acte->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{ $actes->links('Header.pagination') }}

                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "depense") {
                                        @endphp
                                            <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>CODE</th>
                                                <th>Budget</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($depenses as $Depense)
                                                <tr>
                                                    <td>{{ $Depense->nom }}</td>
                                                    <td>{{ $Depense->code }}</td>
                                                    <td>{{ $Depense->budget }}</td>
                                                    <td><div class="col-auto">
                                                            <a href="/PageModifierDepense/{{ $Depense->id }}">
                                                                <span class="circle circle-sm bg-light" title="Modifier">
                                                                    <i class="fe fe-edit"></i>
                                                                </span>
                                                            </a>
                                                            <a href="/supprimerDepense/{{ $Depense->id }}">
                                                                <span class="circle circle-sm bg-light" title="Supprimer">
                                                                    <i class="fe fe-delete"></i>
                                                                </span>
                                                            </a>
                                                        </div></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        {{ $depenses->links('Header.pagination') }}
                                        @php
                                        }
                                        @endphp

                                        @php
                                        if($var == "statistique Depense") {
                                        @endphp

                                        <form action="/YearsForDepense" method="POST">
                                            @csrf
                                            <h3>Filtré par :</h3>
                                            <div class="form-group mb-3">
                                                <label for="custom-select1">Année :</label>
                                                <select class="custom-select" name="annee" id="custom-select1">
                                                @foreach ($year as $annee)
                                                    <option value="{{ $annee->annee }}">{{ $annee->annee }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Voir</button>
                                        </form>
                                            <br><br>
                                            <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Mois</th>
                                                <th>Prix</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total = 0;
                                            @endphp
                                            @foreach ($data as $datas)
                                                <tr>
                                                    <td>{{ $datas['mois'] }}</td>
                                                    <td>{{ $datas['prix'] }}</td>
                                                </tr>

                                                @php
                                            $total += $datas['prix'];
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="2">Somme : <strong>{{ number_format($total, 2, ',', ' ') }} Ar</strong></td>
                                            </tr>
                                        </tbody>
                                            </table>
                                        @php
                                        }
                                        @endphp

                                            @php
                                            if($var == "statistique Recette") {
                                            @endphp

                                            <form action="/YearsForRecette" method="POST">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="custom-select1">Filtré par année :</label>
                                                    <select class="custom-select" name="annee" id="custom-select1">
                                                    @foreach ($year as $annee)
                                                        <option value="{{ $annee->annee }}">{{ $annee->annee }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Voir</button>
                                            </form>
                                                <br><br>
                                                <table class="table table-bordered table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Mois</th>
                                                    <th>Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $total = 0;
                                            @endphp
                                            @foreach ($data as $datas)
                                                <tr>
                                                    <td>{{ $datas['mois'] }}</td>
                                                    <td>{{ $datas['prix'] }}</td>
                                                </tr>

                                                @php
                                            $total += $datas['prix'];
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="2">Somme : <strong>{{ number_format($total, 2, ',', ' ') }} Ar</strong></td>
                                            </tr>
                                        </tbody>
                                            </table>
                                        @php
                                        }
                                        @endphp



@php
    if($var == "statistique Benefice") {
    @endphp

    <form action="/YearsForBenefice" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="custom-select1">Filtré par année :</label>
            <select class="custom-select" name="annee" id="custom-select1">
            @foreach ($year as $annee)
                <option value="{{ $annee->annee }}">{{ $annee->annee }}</option>
            @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="custom-select1">Mois :</label>
            <select class="custom-select" name="mois" id="custom-select1">
                @foreach ($month as $month)
                <option value="{{ $month['chiffre'] }}">{{ $month['nom'] }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Voir</button>
    </form>

        <br><br>
        <label class="custom-markRecette">RECETTE</label>
        <table class="table table-bordered table-hover mb-0">
    <thead>
        <tr>
            <th>Acte</th>
            <th>Reel</th>
            <th>Budget</th>
            <th>Realisation</th>
        </tr>
    </thead>
    <tbody>
    @php
    $totalprix = 0;
    $totalbudget = 0;
    @endphp
    @foreach ($datarecette as $datarecettes)
        <tr>
            <td>{{ $datarecettes->acte->nom }}</td>
            <td>{{ $datarecettes->prix }}</td>
            <td>{{ $datarecettes->budget }}</td>
            <td>
                @if ($datarecettes->budget != 0)
                    @php
                        $pourcentageRecette = ($datarecettes->prix / $datarecettes->budget) * 100;
                    @endphp

                    @if ($pourcentageRecette == 100)
                        100%
                    @else
                        {{ number_format($pourcentageRecette, 2) }}%
                    @endif
                @else
                    N/A
                @endif
            </td>
        </tr>

    @php
    $totalprix += $datarecettes->prix;
    $totalbudget += $datarecettes->budget;
    @endphp
    @endforeach
    <tr>
        <td></td>
        <td>{{$totalprix}}</td>
        <td>{{$totalbudget}}</td>
        <td>
            @if ($totalbudget != 0)
                @php
                    $pourcentageR = ($totalprix / $totalbudget) * 100;
                @endphp

                @if ($pourcentageR == 100)
                    100%
                @else
                    {{ number_format($pourcentageR, 2) }}%
                @endif
            @else
                N/A
            @endif
            </td>
    </tr>
</tbody>
    </table>



    <br><br>
        <label class="custom-markDepense">DEPENSE</label>
        <table class="table table-bordered table-hover mb-0">
    <thead>
        <tr>
            <th>Acte</th>
            <th>Reel</th>
            <th>Budget</th>
            <th>Realisation</th>
        </tr>
    </thead>
    <tbody>
    @php
    $totalprixdepense = 0;
    $totalbudgetdepense = 0;
    @endphp
    @foreach ($datadepense as $datadepenses)
        <tr>
            <td>{{ $datadepenses->depense->nom }}</td>
            <td>{{ $datadepenses->prix }}</td>
            <td>{{ $datadepenses->depense->budget }}</td>
            <td>
                @php
                    $pourcentageDepense = ($datadepenses->prix / $datadepenses->depense->budget) * 100;
                @endphp

                @if ($pourcentageDepense == 100)
                    100%
                @else
                    {{ number_format($pourcentageDepense, 2) }}%
                @endif
            </td>
        </tr>

    @php
    $totalprixdepense += $datadepenses->prix;
    $totalbudgetdepense += $datadepenses->depense->budget;
    @endphp
    @endforeach
    <tr>
        <td></td>
        <td>{{$totalprixdepense}}</td>
        <td>{{$totalbudgetdepense}}</td>
        <td>
            @if ($totalbudgetdepense != 0)
                @php
                    $pourcentageD = ($totalprixdepense / $totalbudgetdepense) * 100;
                @endphp

                @if ($pourcentageD == 100)
                    100%
                @else
                    {{ number_format($pourcentageD, 2) }}%
                @endif
            @else
            N/A
            @endif
        </td>
    </tr>
</tbody>
    </table>

    <br><br>
        <label class="custom-markBenefice">BENEFICE</label>
        <table class="table table-bordered table-hover mb-0">
    <thead>
        <tr>
            <th></th>
            <th>Reel</th>
            <th>Budget</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Recette</td>
            <td>{{$totalprix}}</td>
            <td>{{$totalbudget}}</td>
            <td>
                @if ($totalbudget != 0)
                    @php
                        $pourcentageRecetteB = ($totalprix / $totalbudget) * 100;
                    @endphp

                    @if ($pourcentageRecetteB == 100)
                        100%
                    @else
                        {{number_format($pourcentageRecetteB, 2) }}%
                    @endif
                @else
                N/A
                @endif
        </td>
        </tr>
        <tr>
            <td>Depense</td>
            <td>{{$totalprixdepense}}</td>
            <td>{{$totalbudgetdepense}}</td>
            <td>
                @if ($totalbudgetdepense != 0)
                    @php
                        $pourcentageDepenseB = ($totalprixdepense / $totalbudgetdepense) * 100;
                    @endphp

                    @if ($pourcentageDepenseB == 100)
                        100%
                    @else
                        {{ number_format($pourcentageDepenseB, 2) }}%
                    @endif
                @else
                N/A
                @endif
        </td>
        </tr>

    <tr>
        <td></td>
        <td>{{number_format($totalprix - $totalprixdepense,2, ',', ' ')}}</td>
        <td>{{number_format($totalbudget - $totalbudgetdepense,2, ',', ' ')}}</td>
        <td>
            @if (($totalbudget - $totalbudgetdepense) != 0)
                @php
                    $pourcentageBenefice = (($totalprix - $totalprixdepense) / ($totalbudget - $totalbudgetdepense)) * 100;
                @endphp

                @if ($pourcentageBenefice == 100)
                    100%
                @else
                    {{ number_format($pourcentageBenefice,2) }}%
                @endif
            @else
            N/A
            @endif
        </td>
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