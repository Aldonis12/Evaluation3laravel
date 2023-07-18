<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesActe extends Model
{
    protected $table = 'typesacte';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','budget','code','isdeleted'];
}
