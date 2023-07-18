<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Patient;
use App\Models\PatientActe;
use App\Models\TypesActe;
use App\Models\TypesDepense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use PDF;

class PatientController extends Controller
{
    public function ListePatientActe()
    {
       $patient = Patient::where('isdeleted', 0)->paginate(3);
       $var = "patient";
       $titre = "patient";
       return view('User.List.liste',compact('patient','var','titre')); 
    }

    public function PageAjoutPatientActe($idpatient, $idfacture)
    {
        $url = "ConfirmeAjoutPatientActe";
        $actes = TypesActe::all();
        $titre = "acte pour un patient";
        return view('User.Add.ajout',compact('actes','url','titre','idpatient','idfacture')); 
    }

    public function AjoutPatientActe(Request $request)
    {
        $patientActe = new PatientActe();
        $patientActe->idacte = $request->idacte;
        $patientActe->idfacture = $request->idfacture;
        $patientActe->idpatient = $request->idpatient;
        $patientActe->dateheure = $request->dateheure;
        $patientActe->prix = $request->prix;
        $patientActe->save();

        return $this->PageAjoutPatientActe($request->idpatient,$request->idfacture);
    }

    public function ListeActeParPatient($i)
    {
       $var = "acte par patient";
       $titre = "acte par patient";
       $patientActes = PatientActe::where('idpatient',$i)->get();
       return view('User.List.liste',compact('patientActes','var','titre')); 
    }
    
    public function ListeFactureParPatient($i)
    {
       $var = "facture par patient";
       $titre = "facture par patient";
       $facture = Facture::where('idpatient',$i)->get();
       return view('User.List.liste',compact('facture','var','titre')); 
    }
}
