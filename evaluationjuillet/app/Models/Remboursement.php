<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remboursement extends Model
{
    protected $table = 'remboursement';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idfacture','idpatient','datefacte'];

    public function facture(){
        return $this->belongsTo(Facture::class, 'idfacture');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'idpatient');
    }
}
