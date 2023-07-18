<?php

namespace App\Http\Controllers;

use App\Imports\PrixDepenseImport;
use App\Models\Facture;
use App\Models\PatientActe;
use App\Models\TypesActe;
use App\Models\TypesDepense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use League\Csv\Writer;
use Excel;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    public function PageAjoutFacture($i)
    {
        $url = "ConfirmeAjoutFacture";
        $titre = "facture";
        return view('User.Add.ajout',compact('url','titre','i')); 
    }

    public function AjoutFacture(Request $request)
    {
        $facture = new Facture();
        $facture->idpatient=$request->idpatient;
        $facture->datefacture = $request->datefacture;
        $facture->save();

        $idfacture = $facture->id;

        $controller = new PatientController;
        return $controller->PageAjoutPatientActe($request->idpatient,$idfacture);
    }

    public function GenererPDF($idfacture)
    {
        $facture = Facture::find($idfacture);
        $patientacte = PatientActe::where('idfacture',$idfacture)->get();
        $pdf = PDF::loadView('User.List.pdf', compact('facture','patientacte'));
        return $pdf->download('facture.pdf');
    }
    
    
    public function importCSV(Request $request)
    {
        if ($request->hasFile('csv')) {
            $file=$request->file('csv');
            $handle=fopen($file->getPathname(), 'r');
            $table_data=array();
            while(($data=fgetcsv($handle, 0, ';')) !==false) {
                $values=$data;
                $daty=Carbon::createFromFormat('d/m/Y',$values[0])->format('Y-m-d');
                $type=TypesDepense::Where('code',$values[1])->first();

                $table_data[]=[
                    'iddepense'=> $type->id,
                    'prix'=>$values[2],
                    'inserted'=>$daty
                ];
            }
            fclose($handle);
            DB::table('prixdepense')->insert($table_data);
            return redirect()->back()->with('succes','Enregistrer');
        }
        else return redirect()->back()->with('succes','Erreur d enregistrement');
    }


        public function importFile(){
            $url = "ConfirmeImporteCSV";
            $titre = "CSV fichier";
            return view('User.Add.ajout',compact('url','titre'));
        }


        public function exportCSV()
        {
            $data = DB::table('prixdepense')->get();
            $filename = 'export.csv';
        
            $handle = fopen($filename, 'w');
        
            $headers = ['Date', 'Code', 'Prix'];
            fputcsv($handle, $headers, ';');
        
            foreach ($data as $row) {
                $date = Carbon::parse($row->inserted)->format('d/m/Y');
                $type=TypesDepense::Where('id',$row->iddepense)->first();
                $iddepense = $type->code;
                $prix = $row->prix;
        
                $row_data = [$date, $iddepense, $prix];
                fputcsv($handle, $row_data, ';');
            }
        
            fclose($handle);
        
            return response()->download($filename)->deleteFileAfterSend(true);
        }
        
}
