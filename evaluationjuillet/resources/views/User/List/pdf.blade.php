<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facturation</title>
</head>
<style>
    /*** @media all ***/

        {
        box-sizing: border-box;
    }

    html {
        height: 100%;
    }

    body {
        min-height: 100%;
        margin: 0;
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: stretch;
        font: 12pt/1.5 'Raleway', 'Cambria', sans-serif;
        font-weight: 300;
        background: #fff;
        color: #665;
        -webkit-print-color-adjust: exact;
    }

    header {
        padding: 16px;
        position: relative;
        color: #888;
    }

    header h1,
    header h2 {
        font-weight: 200;
        margin: 0;
    }

    header h1 {
        font-size: 27pt;
        letter-spacing: 4px;
    }

    body>* {
        width: 100%;
        max-width: 7in;
        margin: 3px auto;
        background: #F0f0f0;
        text-align: center;
    }

    footer {
        padding: 16px;
    }

    footer p {
        font-size: 9pt;
        margin: 0;
        font-family: 'Nunito';
        color: #777;
    }

    section,
    table {
        padding: 8px 0;
        position: relative;
    }

    dl {
        margin: 0;
        letter-spacing: -4px;
    }

    dl dt,
    dl dd {
        letter-spacing: normal;
        display: inline-block;
        margin: 0;
        padding: 0px 6px;
        vertical-align: top;
    }

    dl.bloc>dt,
    dl:not(.bloc) dt:not(:last-of-type),
    dl:not(.bloc) dd:not(:last-of-type) {
        border-bottom: 1px solid #ddd;
    }

    dl:not(.bloc) dt {
        border-right: 1px solid #ddd;
    }

    dt {
        width: 49%;
        text-align: right;
        letter-spacing: 1px !important;
        overflow: hidden;
    }

    dd {
        width: 49%;
        text-align: left;
    }

    dd,
    tr>td {
        font-family: 'Nunito';
    }

    section.flex {
        display: flex;
        flex-flow: row wrap;
        padding: 8px 16px;
        justify-content: space-around;
    }

    dl.bloc {
        padding: 0;
        flex: 1;
        vertical-align: top;
        min-width: 240px;
        margin: 0 8px 8px;
    }

    dl.bloc>dt {
        text-align: left;
        width: 100%;
        margin-top: 12px;
    }

    dl.bloc>dd {
        text-align: left;
        width: 100%;
        padding: 8px 0 5px 16px;
        line-height: 1.25;
        /background: #fefefe;/
    }

    dl.bloc>dd>dl dt {
        width: 33%;
    }

    dl.bloc>dd>dl dd {
        width: 60%;
    }

    dl.bloc dl {
        margin-top: 12px;
    }

    dl.bloc dd {
        font-size: 11pt;
    }

    table {
        width: 100%;
        padding: 0;
        border-spacing: 0px;
    }

    tr {
        margin: 0;
        padding: 0;
        background: #fdfdfd;
        border-right: 1px solid #ddd;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #e3e3e3;
        border-top: 1px solid white;
        border-left-color: #fff;
        font-size: 11pt;
        background: #fdfdfd;
    }

    thead th {
        background: #E9E9E9;
        background: linear-gradient(to bottom, #f9f9f9, #e9e9e9) !important;
        font-weight: 300;
        letter-spacing: 1px;
        padding: 15px 0 5px;
        /*&:not(:last-child)*/
        border: none !important;
    }

    tbody tr:last-child td {
        border-bottom: 1px solid #ddd;
    }

    td {
        min-width: 75px;
        padding: 3px 6px;
        line-height: 1.25;
    }

    tfoot tr td {
        /*border: 1px solid #e3e3e3
  border-top: 1px solid white
  border-left-color: #fff;*/
        height: 40px;
        padding: 6px 0 0;
        color: #000;
        text-shadow: 0 0 1px rgba(0, 0, 0, .25);
        font-family: 'Cambria', 'Raleway', sans-serif;
        font-weight: 400;
        letter-spacing: 1px;
    }

    tfoot tr td:first-child {
        font-style: italic;
        color: #997B7B;
    }

    a {
        color: #992C2C;
    }

    a:hover {
        color: #BB0000;
    }

    @page {
        margin: .5cm;
    }

    /*** @media screen ***/


    header:before {
        /* CORNER PAGE EFFECT */
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        border-top: 12px solid #333;
        border-left: 12px solid #ddd;
        width: 0;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, .18);
    }
</style>
<body>
    <header>
    <h1>FACTURE</h1>
        <br><br>
        <dl>
            <dt>Facture</dt>
            <dd>N° {{$facture->id}}</dd>
            <dt>Date de facturation</dt>
            <dd>{{$facture->datefacture}}</dd>
            <dt>Patient</dt>
            <dd>{{$facture->patient->nom}}</dd>
        </dl>
        <br>
        <br>
    <table>
        <thead>
            <tr>
                <th>Acte</th>
                <th>Prix</th>
            </tr>
        </thead>
        @php
            $total = 0;
        @endphp
        <tbody>
            @foreach ($patientacte as $patientactes)
                <tr>
                    <td>{{ $patientactes->acte->nom }}</td>
                    <td>{{ $patientactes->prix }}</td>
                </tr>
                @php
                    $total += $patientactes->prix;
                @endphp
            @endforeach
        </tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td><strong style="color:#333">{{ number_format($total,2, ',', ' ') }} AR</strong></td>
            </tr>
    </table>
    <br>
</header>
</body>

</html>
