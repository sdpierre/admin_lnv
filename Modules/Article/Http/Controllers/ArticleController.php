<?php

namespace Modules\Article\Http\Controllers;

use App\Article;
use App\User;
use App\Category;
use App\SubCategory;
use Auth;
use App\UsersGroups;
use App\MediaArticle;
use App\Media;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $articles = [];

        $datepublication = (!empty($_GET['datepublication'])) ? $_GET['datepublication'] : '';

        $categories = Category::where('onsite','TRUE')->get();

        foreach($categories as $category){
            $category_id = $category['rubriqueid'];

            if(!empty($datepublication)){
                //$posts = Article::where('rubriqueid',$category_id)->whereRaw('created_at >= curdate()')->where('datepublication',$datepublication)->orderBy('created_at','desc')->get();
                $posts = Article::where('rubriqueid',$category_id)->whereRaw('datepublication >= curdate()')->where('datepublication',$datepublication)->orderBy('created_at','desc')->get();


            }else {
                $posts = Article::where('rubriqueid',$category_id)->whereRaw('created_at >= curdate()')->orderBy('created_at','desc')->get();
            }
            
            $category['articles'] = $posts;
        }          

        
        return view('article::index')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {

        $users = (new user)->get_redacteurs();
        $collab = (new user)->get_collaborateurs();
        $category = (new Category)->category_online();
        $chroniques = SubCategory::all()->groupBy('rubrique_id');
        $article = new Article();
        
        $userid = Auth::user()->id;
        
        $user_details = UsersGroups::select('*')
		//->join('users_groups','users_groups.user_id','=','groups.id')
	    ->where('user_id',$userid)
	    ->get();
        $article->datepublication = Carbon::today();
        
        return view('article::create',compact('article', 'category','users','chroniques','collab','user_details'));
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
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('article::edit');
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
    public function addPhoto($id)
    {
        $article = Article::where('id_article',$id)->first();
        $media_article = MediaArticle::with(['media'])->where('media_article.article_id',$article->id_article)->get();

        return view('article::add-photo', ['article' => $article, 'media_articles' => $media_article]);
    }

    public function deleteMediaArticle(Request $request)
    {
        $media_article_id = $request->post('media_article_id');
        $article_id = $request->post('article_id');

        if( isset($media_article_id) && !empty($media_article_id) ) {
            MediaArticle::where('id',$media_article_id)->delete();
        }

        return redirect('article/add-photo/'.$article_id);
    }

    public function getMediaPhoto()
    {
        $medias = Media::orderBy('created_at','desc')->get();

        return Response::json(\View::make('article::media-gallery', ['media_gallery' => $medias])->render());
    }

    public function addMediaArticle(Request $request)
    {
        $article_id = $request->post('article_id');
        $media_id = $request->post('media_id');

        if(!empty($article_id) && !empty($media_id)) {
            $mediaArticle = new MediaArticle;
            $mediaArticle->article_id = $article_id;
            $mediaArticle->media_id = $media_id;
            $mediaArticle->save();
        }

        return redirect('article/add-photo/'.$article_id);
    }

    public function updateMediaArticlePhoto(Request $request)
    {
        $media_article_id = $request->post('media_article_id');
        $article_id = $request->post('article_id');

        if( isset($media_article_id) && !empty($media_article_id) ) {
            $media_id = $request->post('media_id');

            $mediaArticle = MediaArticle::find($media_article_id);
            $mediaArticle->media_id = $media_id;
            $mediaArticle->save();
            
        }

        return redirect('article/add-photo/'.$article_id);
    }


    public function addRemoveFeaturedImage(Request $request)
    {
        $media_article_id = $request->post('media_article_id');
        $article_id = $request->post('article_id');

        if(!empty($media_article_id) && !empty($article_id)) {
            $media_article = MediaArticle::where('article_id',$article_id)->where('is_featured','TRUE')->first();
            $add_featured = MediaArticle::find($media_article_id);

            if(!empty($media_article)){
                $remove_featured = MediaArticle::find($media_article->id);
                $remove_featured->is_featured = 'FALSE';
                $remove_featured->save();

                $add_featured->is_featured = 'TRUE';
                $add_featured->save();

                return 'TRUE';
            }else{
                
                $add_featured->is_featured = 'TRUE';
                $add_featured->save();

                return 'TRUE';
            }
        }else{
            return 'FALSE';
        }
    }
}
