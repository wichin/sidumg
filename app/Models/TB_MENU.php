<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_MENU extends Model
{
    protected $table = 'TB_MENU';
    public $timestamps = false;

    public function AccesoRol()
    {
        return $this->hasMany('App\Models\TB_ACCESO_ROL','id_menu','id');
    }
    
    public function Modulo()
    {
        return $this->belongsTo('App\Models\TB_MODULO','id_modulo','id');
    }    
}