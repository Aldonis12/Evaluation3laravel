<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesDepense extends Model
{
    protected $table = 'typesdepense';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','budget','code','isdeleted'];
}
