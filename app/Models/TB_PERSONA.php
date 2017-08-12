<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TB_PERSONA extends Model
{
    protected $table = 'TB_PERSONA';
    public $timestamps = false;

    public function Usuario()
    {
        return $this->hasMany('App\Models\TB_USUARIO','id_persona','id');
    }

    public function TipoDocumento()
    {
        return $this->belongsTo('App\Models\CAT_TIPO_DOCUMENTO','id_tipo_documento','id');
    }
    
    public function Genero()
    {
        return $this->belongsTo('App\Models\CAT_GENERO','id_genero','id');
    }

    public function Nacionalidad()
    {
        return $this->belongsTo('App\Models\CAT_NACIONALIDAD','id_nacionalidad','id');
    }
}