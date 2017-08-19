<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class TB_METAS extends Model
{
    protected $table = 'TB_METAS';
    public $timestamps = false;

    public function Empresa()
    {
        return $this->belongsTo('App\Models\TB_EMPRESA','id_empresa','id');
    }
}