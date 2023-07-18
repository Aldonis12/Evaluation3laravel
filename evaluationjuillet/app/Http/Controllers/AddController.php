<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\TypesActe;
use App\Models\TypesDepense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    public function PageAjoutPatient()
    {
        $url = "ConfirmeAjoutPatient";
        $genre = DB::select('Select * from genre');
        $titre = "patient";
        return view('Admin.Add.ajout',compact('genre','url','titre')); 
    }

    public function AjoutPatient(Request $request)
    {
        $patient = new Patient();
        $patient->nom = $request->nom;
        $patient->dtn = $request->dtn;
        $patient->idgenre = $request->idgenre;
        $patient->remboursement = $request->remboursement;
        $patient->save();

        return $this->PageAjoutPatient();
    }

    public function PageAjoutActe()
    {
        $url = "ConfirmeAjoutActe";
        $titre = "acte";
        return view('Admin.Add.ajout',compact('url','titre')); 
    }

    public function AjoutActe(Request $request)
    {
        $acte = new TypesActe();
        $acte->nom = $request->nom;
        $acte->budget = $request->budget;
        $acte->code = $request->code;
        $acte->save();

        return $this->PageAjoutActe();
    }

    public function PageAjoutDepense()
    {
        $url = "ConfirmeAjoutDepense";
        $titre = "depense";
        return view('Admin.Add.ajout',compact('url','titre')); 
    }

    public function AjoutDepense(Request $request)
    {
        $Depense = new TypesDepense();
        $Depense->nom = $request->nom;
        $Depense->budget = $request->budget;
        $Depense->code = $request->code;
        $Depense->save();

        return $this->PageAjoutDepense();
    }

    public function PageAjoutPrixDepense()
    {
        $url = "ConfirmeAjoutPrixDepense";
        $depense = TypesDepense::all();
        $titre = "prix acte depense";
        return view('User.Add.ajout',compact('depense','url','titre')); 
    }

    public function AjoutPrixDepense(Request $request)
    {
        $iddepense = $request->input('iddepense');
        $prix = $request->input('prix');
        $jour = $request->input('jour');
        $annee = $request->input('annee');
        $moisSelectionnes = $request->input('mois', []);

        $dates = [];
        if (is_array($moisSelectionnes) && count($moisSelectionnes) > 0) {
            foreach ($moisSelectionnes as $mois) {
                $date = $annee . '-' . $mois . '-' . $jour;
                $dates[] = $date;
            }
        }

        foreach ($dates as $date) {
            DB::insert('insert into prixdepense(iddepense, prix, inserted) values (?, ?, ?)', [$iddepense, $prix, $date]);
        }
        return ($this->PageAjoutPrixDepense());
    }
}
