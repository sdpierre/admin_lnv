<?php namespace App\Modules\Annonces\Models;

use Illuminate\Database\Eloquent\Model;

class AnnoncesType extends Model {

	protected $table = 'annonces_type';
	

	public function ListType()
	{
	  return AnnoncesType::where('ispublishedonline','TRUE')->orderBy('rubriquename', 'ASC')->get();
	  
	}

	
}