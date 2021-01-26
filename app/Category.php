<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'article_category';


    public function category_online(){
        return Category::select('id','name','is_active','slug')
			->where('is_active','TRUE')
			->get();
    }

    /**
     * Category has many Articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
        return $this->hasMany(Article::class, 'rubriqueid', 'rubriqueid');
    }


}