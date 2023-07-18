<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $table = 'facture';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idpatient','datefacture'];

    public function Patient(){
        return $this->belongsTo(Patient::class, 'idpatient');
    }
}
