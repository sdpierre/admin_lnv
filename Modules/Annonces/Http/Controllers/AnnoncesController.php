<?php namespace App\Modules\Annonces\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Annonces\Models\Annonces;
use Illuminate\Http\Request;
use App\Modules\Annonces\Models\Departements;
use App\Modules\Annonces\Models\Villes;
use App\Modules\Annonces\Models\AnnoncesType;
class AnnoncesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id="2";
		$featured = Annonces::where('featured','TRUE')->get();
		$annonces = (new AnnoncesType)->ListType();
		$departement =(new Departements)->departements();
		$villes =(new Villes)->annonces_villes();
		
		$annoncesRubriq =  Annonces::where('rubriqueid','2')->paginate(5);
		$nameRubr =  AnnoncesType::where('rubriqueid','2')->get();
		foreach($nameRubr as $key){ $rubriquename = $key->rubrique;}	
		return view("Annonces::index",compact('annonces','departement','villes','annoncesRubriq','featured','rubriquename'));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function search(Request $request)
	{
		$annonces = (new AnnoncesType)->ListType();
		$departement =(new Departements)->departements();
		$villes =(new Villes)->annonces_villes();
		if($request->options == "titre"){  $search = "titre";}else{  $search = "texte";}
		$search =(new Annonces)->allwhere($search, $request->categories,$request->search,$request->départements,$request->ville);

		if($request->categories == "Toutes categories" And $request->départements == "Tous les départements" And $request->ville == "Tous les villes"){
			$annoncesRubriq =  Annonces::where($search, 'LIKE', "%$request->search%")->paginate(1);	

			
		}elseif($request->départements != "Toutes categories"){
					
			$annoncesRubriq =  Annonces::where($search, 'LIKE', "%$request->search%")->
			where('rubriqueid',$request->categories)->
			where('departement_id',$request->départements)->paginate(10);	
			
		}elseif($request->ville != "Toutes categories"){
			
			$annoncesRubriq =  Annonces::where($search, 'LIKE', "%$request->search%")->
			where('rubriqueid',$request->categories)->
			where('ville_id',$request->ville)->paginate(10);
		}
		$featured =Annonces::where('featured','TRUE')->get();			      
					
		return view("Annonces::search",compact('annonces','departement','villes','annoncesRubriq','featured'));	

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function rubrique_id($id)
	{
		$annonces = (new AnnoncesType)->ListType();
		$departement =(new Departements)->departements();
		$villes =(new Villes)->annonces_villes();
		$featured =Annonces::where('featured','TRUE')->get();
		$annoncesRubriq =  Annonces::where('rubriqueid',$id)->paginate(5);	
		$nameRubr =  AnnoncesType::where('rubriqueid',$id)->get();
		foreach($nameRubr as $key){ $rubriquename = $key->rubrique;}
		return view("Annonces::index",compact('annonces','departement','villes','annoncesRubriq','featured','rubriquename'));	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$annonces = (new AnnoncesType)->ListType();
		$departement =(new Departements)->departements();
		$villes =(new Villes)->annonces_villes();
		$featured =Annonces::where('featured','TRUE')->get();
		$annonces=  Annonces::where('id_annonces',$id)->get();
		$nameRubr =  AnnoncesType::where('rubriqueid','2')->get();
		foreach($nameRubr as $key){ $rubriquename = $key->rubrique;}	
		return view("Annonces::view",compact('annonces','departement','villes','annonces','featured','rubriquename'));
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
