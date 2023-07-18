<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','dtn','idgenre','remboursement','isdeleted'];

    public function Genre(){
        return $this->belongsTo(Genre::class, 'idgenre');
    }

}
