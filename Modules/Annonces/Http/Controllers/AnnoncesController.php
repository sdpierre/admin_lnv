<?php

namespace Modules\Annonces\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Annonces\Entities\Annonces;
use Modules\Annonces\Entities\Departements;
use Modules\Annonces\Entities\Villes;
use Modules\Annonces\Entities\AnnoncesType;
use Validator;
use Redirect;
class AnnoncesController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$id = "2";
		$featured = Annonces::where('featured', 'TRUE')->get();
		$AnnoncesType = (new AnnoncesType)->ListType();
		$departement = (new Departements)->departements();
		$villes = (new Villes)->annonces_villes();
		$all_annonce = (new Annonces)->AllAnnonces();
		
		$annoncesRubriq =  Annonces::where('rubriqueid', '1')->paginate(5);
		$nameRubr =  AnnoncesType::where('rubriqueid', '2')->get();
		foreach ($nameRubr as $key) {
			$rubriquename = $key->rubrique;
		}
		
		return view("annonces::index", compact('AnnoncesType', 'departement', 'villes', 'annoncesRubriq', 'featured', 'rubriquename','all_annonce'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	
		/** -----   Publier annonce ------ */

		public function publier_annonce(Request $request)
		{
			$rules = [
				'feuillederoute'         => 'required',
				'rubriqueid'             => 'required',
				'titre'                  => 'required',
				'texte'                  => 'required',
				'date'                   => 'required',
				'departements'           => 'required',
				'villes'                 => 'required',
			];
			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return Redirect::back()->withErrors($validator);
			}
	
			if(empty($request->id_annonces)){
				$createAnnces                       = new Annonces();
				$createAnnces->feuillederoute       = $request->feuillederoute;
				$createAnnces->rubriqueid           = $request->rubriqueid;
				$createAnnces->titre                = $request->titre;
				$createAnnces->texte                = $request->texte;
				$createAnnces->datepublication      = $request->date;
				$createAnnces->departements         = $request->departements;
				$createAnnces->villes               = $request->villes;
				$createAnnces                       = $createAnnces->save();
				return redirect('annonces');
			}else{

				$updateAnnces = Annonces::findOrFail($request->id_annonces);
				$updateAnnces->feuillederoute       = $request->feuillederoute;
				$updateAnnces->rubriqueid           = $request->rubriqueid;
				$updateAnnces->titre                = $request->titre;
				$updateAnnces->texte                = $request->texte;
				$updateAnnces->datepublication      = $request->date;
				$updateAnnces->departements         = $request->departements;
				$updateAnnces->villes               = $request->villes;
				$updateAnnces                       = $updateAnnces->update();
				return redirect('annonces');
			}
		}


	/** Publier annonce */


	public function search(Request $request)
	{
		$annonces = (new AnnoncesType)->ListType();
		$departement = (new Departements)->departements();
		$villes = (new Villes)->annonces_villes();
		if ($request->options == "titre") {
			$search = "titre";
		} else {
			$search = "texte";
		}
	
		$search = (new Annonces)->allwhere($search, $request->categories, $request->search, $request->départements, $request->ville);

		if ($request->categories == "Toutes categories" and $request->départements == "Tous les départements" and $request->ville == "Tous les villes") {
			$annoncesRubriq =  Annonces::where($search, 'LIKE', "%$request->search%")->paginate(1);
		} elseif ($request->départements != "Toutes categories") {

			$annoncesRubriq =  Annonces::where($search, 'LIKE', "%$request->search%")->where('rubriqueid', $request->categories)->where('departement_id', $request->départements)->paginate(10);
		} elseif ($request->ville != "Toutes categories") {

			$annoncesRubriq =  Annonces::where($search, 'LIKE', "%$request->search%")->where('rubriqueid', $request->categories)->where('ville_id', $request->ville)->paginate(10);
		}
		$featured = Annonces::where('featured', 'TRUE')->get();

		return view("annonces::search", compact('annonces', 'departement', 'villes', 'annoncesRubriq', 'featured'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */



	public function rubrique($id)
	{
		$annonces = (new AnnoncesType)->ListType();
		$departement = (new Departements)->departements();
		$villes = (new Villes)->annonces_villes();
		$featured = Annonces::where('featured', 'TRUE')->get();
		$annoncesRubriq =  Annonces::where('rubriqueid', $id)->paginate(5);
		$nameRubr =  AnnoncesType::where('rubriqueid', $id)->get();
		
		foreach ($nameRubr as $key) {
			$rubriquename = $key->rubrique;
		}
		return view("annonces::index", compact('annonces', 'departement', 'villes', 'annoncesRubriq', 'featured', 'rubriquename'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$AnnoncesType = (new AnnoncesType)->ListType();
		$departement = (new Departements)->departements();
		$villes = (new Villes)->annonces_villes();
		$featured = Annonces::where('featured', 'TRUE')->get();
		$annonces_id =  Annonces::where('id_annonces', $id)->get();
		$nameRubr =  AnnoncesType::where('rubriqueid', '2')->get();
		$all_annonce = (new Annonces)->AllAnnonces();
		foreach ($annonces_id as $key) {
			$feuillederoute = $key->feuillederoute;
			$rubriqueid = $key->rubriqueid;
			$departements = $key->departements;
			$villesid = $key->villes;
			$titre = $key->titre;
			$texte = $key->texte;
			$date = $key->datepublication;
			$id_annonces= $key->id_annonces;
		}
		return view("annonces::index", compact('id_annonces','date','titre','texte','departements','villesid','rubriqueid','annonces_id', 'departement', 'villes', 'AnnoncesType', 'featured', 'feuillederoute','all_annonce'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$rules = [
			'feuillederoute'         => 'required',
			'rubriqueid'             => 'required',
			'titre'                  => 'required',
			'texte'                  => 'required',
			'date'                   => 'required',
			'departements'           => 'required',
			'villes'                 => 'required',
		];
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}

		$updateAnnces = Annonces::findOrFail($request->id_annonces);
		$updateAnnces->feuillederoute       = $request->feuillederoute;
		$updateAnnces->rubriqueid           = $request->rubriqueid;
		$updateAnnces->titre                = $request->titre;
		$updateAnnces->texte                = $request->texte;
		$updateAnnces->datepublication      = $request->date;
		$updateAnnces->departements         = $request->departements;
		$updateAnnces->villes               = $request->villes;
		$updateAnnces                       = $updateAnnces->update();


		//return redirect('annonces');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$flight = Annonces::find($id);
		$flight->delete();
		return redirect('annonces');
	}
}
