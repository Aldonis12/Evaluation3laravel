<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistique_recette extends Model
{
    protected $table = 'statistique_recette';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idacte','idfacture','idpatient','prix','budget','datefacture'];

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
