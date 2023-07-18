<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\TypesActe;
use App\Models\TypesDepense;
use Illuminate\Http\Request;

class DeleteController extends Controller
{

    public function DeletePatient($id)
    {
        $patient = Patient::find($id);
        $patient->isdeleted = 1;
        $patient->update();

        $controller = new ListController;
        return $controller->ListePatient();
    }

    public function DeleteActe($id)
    {
        $Acte = TypesActe::find($id);
        $Acte->isdeleted = 1;
        $Acte->update();

        $controller = new ListController;
        return $controller->ListeActe();
    }

    public function DeleteDepense($id)
    {
        $Depense = TypesDepense::find($id);
        $Depense->isdeleted = 1;
        $Depense->update();

        $controller = new ListController;
        return $controller->ListeDepense();
    }

    
}
