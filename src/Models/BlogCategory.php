<?php

namespace Facilinfo\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes qf are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

   /* public function posts()
    {
        return $this->hasMany('App\Post', 'category_id');
    }

    public static function boot()
    {
        parent::boot();

        // cause a delete of a category to cascade to children so they are also deleted
        static::deleted(function($category)


        {
            $posts=Post::where('category_id', '=', $category->id)->get();

            foreach($posts as $post){
                $comments=Comment::where('on_post', '=', $post->id);
                $comments->delete();
            }
            $category->posts()->delete();
        });
    }

    */
}
