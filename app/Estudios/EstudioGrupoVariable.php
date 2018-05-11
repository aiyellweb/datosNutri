<?php

namespace App\Estudios;

use Illuminate\Database\Eloquent\Model;

class EstudioGrupoVariable extends Model
{
    protected $table="estudios_grupo_variables";
	public $timestamps=false;
	protected $fillable = ['fk_grupo_variable_id','fk_estudio_id'];
}
