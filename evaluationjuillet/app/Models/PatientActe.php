<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientActe extends Model
{
    protected $table = 'patientacte';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idacte','idfacture','idpatient','prix','dateheure'];

    public function acte(){
        return $this->belongsTo(TypesActe::class, 'idacte');
    }

    public function facture(){
        return $this->belongsTo(Facture::class, 'idfacture');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'idpatient');
    }
}
