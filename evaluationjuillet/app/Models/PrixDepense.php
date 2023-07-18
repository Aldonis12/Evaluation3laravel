<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixDepense extends Model
{
    protected $table = 'prixdepense';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['iddepense','prix','inserted'];

    public function depense(){
        return $this->belongsTo(TypesDepense::class, 'iddepense');
    }
}
