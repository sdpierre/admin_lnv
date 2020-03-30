<?php

namespace Modules\Newsletters\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\NewsLetter;

class NewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $newsLetters = NewsLetter::orderBy('id', 'DESC')->get()->all();
        return view('newsletters::index')->with('newsLetters', $newsLetters);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('newsletters::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        /*if ($request->hasFile('photo')) {
            die('yes');
        } die('no');*/
        $createNews              = new NewsLetter();
        $createNews->title       = $request->title;
        $createNews->caption     = $request->caption;
        $createNews->description = $request->description;
        $createNews->url         = $request->url;
        $createNews->photo       = " ";
        $createNews->date        = $request->date;
        $createNews->active      = 1;
        $newsCreated             = $createNews->save();
        return redirect('newsletters');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('newsletters::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $editNews = NewsLetter::findOrFail($id);
        $newsLetters = NewsLetter::orderBy('id', 'DESC')->get()->all();
        return view('newsletters::edit')->with('editNews', $editNews)->with('newsLetters', $newsLetters);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $updateNews = NewsLetter::findOrFail($id);
        $updateNews->title       = $request->title;
        $updateNews->caption     = $request->caption;
        $updateNews->description = $request->description;
        $updateNews->url         = $request->url;
        $updateNews->photo       = " ";
        $updateNews->date        = $request->date;
        $updateNews->active      = 1;
        $updatednews             = $updateNews->update();
        return redirect('newsletters');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        NewsLetter::destroy($id);
        return redirect('newsletters');
    }
}
