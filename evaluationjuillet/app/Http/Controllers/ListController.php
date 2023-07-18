<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Patient;
use App\Models\PatientActe;
use App\Models\PrixDepense;
use App\Models\Statistique_recette;
use App\Models\TypesActe;
use App\Models\TypesDepense;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ListController extends Controller
{
   //Admin - Patient
    public function ListePatient()
    {
       $patient = Patient::where('isdeleted', 0)->paginate(3);
       $var = "patient";
       return view('Admin.List.liste',compact('patient','var')); 
    }

   //Admin - Acte
    public function ListeActe()
    {
       $actes = TypesActe::where('isdeleted', 0)->paginate(5);
       $var = "acte";
       return view('Admin.List.liste',compact('actes','var')); 
    }

   //Admin - Depense
    public function ListeDepense()
    {
       $depenses = TypesDepense::where('isdeleted', 0)->paginate(5);
       $var = "depense";
       return view('Admin.List.liste',compact('depenses','var')); 
    }
   
   //Admin - Statistique depense
   public function StatistiqueDepense($annee)
   {
      $var = "statistique Depense";
      $year = DB::select(' select extract(year from inserted) as annee from prixdepense group by extract(year from inserted)');
      $data = [];

      for ($mois = 1; $mois <= 12; $mois++) {
         $prix = PrixDepense::whereYear('inserted', $annee)
                        ->whereMonth('inserted', $mois)
                        ->sum('prix');

         $moisEnLettre = Carbon::createFromDate($annee, $mois)->locale('fr')->monthName;

         if ($prix > 0) {
            $data[] = [
                  'mois' => $moisEnLettre,
                  'prix' => $prix,
            ];
         }
      }
      return view('Admin.List.liste',compact('data','var','year','annee')); 
    }

    public function YearsForDepense(Request $request)
    {
      return redirect('/StatistiqueDepense/'.$request->annee);
    }

   //Admin - Statistique recette
    public function StatistiqueRecette($annee)
    {
      $var = "statistique Recette";
      $year = DB::select(' select extract(year from dateheure) as annee from patientacte group by extract(year from dateheure)');
      $data = [];

      for ($mois = 1; $mois <= 12; $mois++) {       
         $prix = PatientActe::join('facture', 'patientacte.idfacture', '=', 'facture.id')
         ->whereYear('facture.datefacture', $annee)
         ->whereMonth('facture.datefacture', $mois)
         ->sum('patientacte.prix');

         $moisEnLettre = Carbon::createFromDate($annee, $mois)->locale('fr')->monthName;

         if ($prix > 0) {
            $data[] = [
                  'mois' => $moisEnLettre,
                  'prix' => $prix,
            ];
         }
      }
      return view('Admin.List.liste',compact('data','var','year','annee')); 
    }

    public function YearsForRecette(Request $request)
    {
      return redirect('/StatistiqueRecette/'.$request->annee);
    }


    public function StatistiqueBenefice($annee,$mois){
      $var = "statistique Benefice";
      $year = DB::select(' select extract(year from inserted) as annee from prixdepense group by extract(year from inserted)');
      
      $month = collect([]);
        for ($i = 1; $i <= 12; $i++) {
            $month->push([
                'nom' => Carbon::createFromFormat('m', $i)->format('F'),
                'chiffre' => $i
            ]);
        }
        if ($annee == 0 && $mois == 0) {
            $datadepense = PrixDepense::join('typesdepense', 'prixdepense.iddepense', '=', 'typesdepense.id')
            ->select('prixdepense.*', 'typesdepense.budget')
            ->get();
            $datarecette = Statistique_recette::all();
            
         } else{
            $datadepense = PrixDepense::join('typesdepense', 'prixdepense.iddepense', '=', 'typesdepense.id')
            ->select('prixdepense.*', 'typesdepense.budget')
            ->whereMonth('inserted',$mois)
            ->whereYear('inserted', $annee)
            ->get();
   
            $datarecette = Statistique_recette::whereYear('datefacture', $annee)
            ->whereMonth('datefacture',$mois)
            ->get();
         }

      return view('Admin.List.liste',compact('datadepense','datarecette','var','year','annee','month')); 
    }

    public function YearsForBenefice(Request $request)
    {
      return redirect('/StatistiqueBenefice/'.$request->annee.'/'.$request->mois);
    }



   //User - Prix Depense
    public function ListePrixDepense()
    {
       $depenses = PrixDepense::paginate(5);
       $var = "prix depense";
       $titre = "prix depense";
       return view('User.List.liste',compact('depenses','var','titre')); 
    }

   //User - Facture
    public function AllFacture()
    {
      $facture = Facture::orderBy('datefacture', 'desc')->paginate(5);
      $var = "des factures";
      $titre = "des factures";
      return view('User.List.liste',compact('facture','var','titre')); 
    }

   //User - Details Facture
    public function DetailsFacture($i)
    {
      $patientacte = PatientActe::where('idfacture',$i)->get();
      $var = "details factures";
      $titre = "details factures N°".$i;
      return view('User.List.liste',compact('patientacte','var','titre','i')); 
    }
}
