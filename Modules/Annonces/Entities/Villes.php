<?php namespace App\Modules\Annonces\Models;

use Illuminate\Database\Eloquent\Model;

class Villes extends Model {

	protected $table = 'annonces_villes';
	

	public function annonces_villes()
	{
	  return Villes::all();
	}
	
	

}
