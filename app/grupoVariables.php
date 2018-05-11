<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupoVariables extends Model
{
	protected $table="grupo_variables";
	protected $primaryKey="grupo_variable_id";
	public   $timestamps=false;
	protected $fillable=['grupo_variable_id','grupo_nombre'];
}
