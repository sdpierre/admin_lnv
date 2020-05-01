<?php namespace Modules\Annonces\Entities;

use Illuminate\Database\Eloquent\Model;

class Departements extends Model {

	protected $table = 'annonces_departements';
	

	public function departements()
	{
	  return Departements::all();
	}
	
	

}
