<?php

namespace Modules\Annonces\Entities;;

use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{

	protected $table = 'annonces';


	public function allwhere($searchD, $cat, $search, $depat, $ville)
	{
		return Annonces::where($search, 'LIKE', "%$search%")->where('rubriqueid', $cat)->where('departement', $depat)->where('ville', $ville)->paginate(5);
	}
	public function AnnoncesRubriq($id)
	{

		return Annonces::where('rubriqueid', $id)->paginate(5);
	}

	public function AnnoncesFeatured()
	{

		return Annonces::where('featured', 'TRUE')->paginate(5);
	}
}
