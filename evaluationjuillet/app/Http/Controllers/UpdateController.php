<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientActe;
use App\Models\PrixDepense;
use App\Models\TypesActe;
use App\Models\TypesDepense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function PageModifierPatient($id)
    {
        $Patient = Patient::find($id);
        $genre = DB::select('Select * from genre');
        $url = "ConfirmeModifierPatient";
        $titre = "patient";
        return view('Admin.Update.update', compact('genre','Patient','url', 'titre'));
    }

    public function ModifierPatient(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'dtn' => 'required',
            'idgenre' => 'required',
            'remboursement' => 'required',
        ]);

        $Patient = Patient::find($request->id);
        $Patient->nom = $request->nom;
        $Patient->dtn = $request->dtn;
        $Patient->idgenre = $request->idgenre;
        $Patient->remboursement = $request->remboursement;
        $Patient->update();

        $controller = new ListController;
        return $controller->ListePatient();
    }

    public function PageModifierActe($id)
    {
        $Acte = TypesActe::find($id);
        $url = "ConfirmeModifierActe";
        $titre = "acte";
        return view('Admin.Update.update', compact('Acte', 'url', 'titre'));
    }

    public function ModifierActe(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
        ]);

        $Acte = TypesActe::find($request->id);
        $Acte->nom = $request->nom;
        $Acte->budget = $request->budget;
        $Acte->code = $request->code;
        $Acte->update();

        $controller = new ListController;
        return $controller->ListeActe();
    }

    public function PageModifierDepense($id)
    {
        $Depense = TypesDepense::find($id);
        $url = "ConfirmeModifierDepense";
        $titre = "depense";
        return view('Admin.Update.update', compact('Depense', 'url', 'titre'));
    }

    public function ModifierDepense(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
        ]);

        $Depense = TypesDepense::find($request->id);
        $Depense->nom = $request->nom;
        $Depense->budget = $request->budget;
        $Depense->code = $request->code;
        $Depense->update();

        $controller = new ListController;
        return $controller->ListeDepense();
    }

    public function PageModifierPrixDepense($id)
    {
        $Depense = PrixDepense::find($id);
        $url = "ConfirmeModifierPrixDepense";
        $titre = "prix depense";
        return view('User.Update.update', compact('Depense', 'url', 'titre'));
    }

    public function ModifierPrixDepense(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'prix' => 'required',
            'inserted' => 'required',
        ]);

        $Depense = PrixDepense::find($request->id);
        $Depense->prix = $request->prix;
        $Depense->inserted = $request->inserted;
        $Depense->update();

        return redirect('/PrixDepense');
    }

    public function PageModifierPatientActe($id)
    {
        $Patient = PatientActe::find($id);
        $url = "ConfirmeModifierPatientActe";
        $titre = "patient acte";
        return view('User.Update.update', compact('Patient', 'url', 'titre'));
    }

    public function ModifierPatientActe(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'prix' => 'required',
            'dateheure' => 'required',
        ]);

        $Pa = PatientActe::find($request->id);
        $Pa->prix = $request->prix;
        $Pa->dateheure = $request->dateheure;
        $Pa->update();

        return redirect('/ListeActeParPatient/'.$Pa->idpatient);
    }
}
