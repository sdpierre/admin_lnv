<?php

namespace Modules\Search\Http\Controllers;

use Modules\Article\Entities\Article;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $req){
        $q = Article::where('is_active', '!=', 'DELETE');
        if($req->has('title') && $req->get('title'))
            $q->where('title', 'LIKE', "%".$req->get('title')."%");
        if($req->has('author') && $req->get('author'))
            $q->where('auteurid', $req->get('author'));
        if($req->has('article_word') && $req->get('article_word'))
            $q->where('article', 'LIKE', "%".$req->get('article_word')."%");
        if($req->has('author_name') && $req->get('author_name'))
            $q->where('auteur', 'LIKE', "%".$req->get('author_name')."%");
        if($req->has('min_date') && $req->get('min_date'))
            $q->where('publication_date', '>=', Carbon::parse($req->get('min_date')));
        if($req->has('max_date') && $req->get('max_date'))
            $q->where('publication_date', '<=', Carbon::parse($req->get('max_date')));
        $articles = $q->orderBy('publication_date','DESC')->paginate(30);
        // return $req->all();
        
        $authors = (new User)->get_redacteurs();
        return view('search::index', compact('articles', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('search::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('search::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('search::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
