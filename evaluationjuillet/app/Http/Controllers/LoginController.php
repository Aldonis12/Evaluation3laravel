<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $mail = $request->input('mail');
        $mdp = $request->input('mdp');

        $idadmin = DB::select('SELECT idadmin FROM Admin WHERE nom = ? and mdp = ?', [$mail, $mdp]);
        $iduser = DB::select('SELECT id FROM Employe WHERE email = ? and mdp = ?', [$mail, $mdp]);

        if(count($idadmin) != 0 && count($iduser) == 0){
            session()->put('idadmin', $idadmin[0]->idadmin);
            $controller = new ListController;
            return $controller->ListePatient();
        }
        else if(count($idadmin) == 0 && count($iduser) != 0){
            session()->put('iduser', $iduser[0]->id);
            return redirect('/PatientActe');
        } else if(count($idadmin) == 0 && count($iduser) == 0){
            return view('login')->with('error', 'error');
        }
    }

    public function Logout()
    {
        session()->flush();
        return redirect('/');
    }

}
