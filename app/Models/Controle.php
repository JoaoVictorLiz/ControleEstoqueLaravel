<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Exception;


class Controle extends Model
{
    use HasFactory;

    protected $table = 'estoque_produtos';

    protected $dates = ['data'];

    protected $guarded = [];

    public function user(){
        return $this->belongTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }


}
