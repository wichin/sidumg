<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_ACCESO_ROL extends Model
{
    protected $table = 'TB_ACCESO_ROL';
    public $timestamps = false;

    public function Menu()
    {
        return $this->belongsTo('App\Models\TB_MENU','id_menu','id');
    }
    
    public function Rol()
    {
        return $this->belongsTo('App\Models\TB_ROL','id_rol','id');
    }
}