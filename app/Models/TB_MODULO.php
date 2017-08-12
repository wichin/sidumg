<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_MODULO extends Model
{
    protected $table = 'TB_MODULO';
    public $timestamps = false;    
    
    public function Menu()
    {
        return $this->hasMany('App\Models\TB_MENU','id_modulo','id');
    }    
}