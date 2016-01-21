<?php

namespace Facilinfo\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

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

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function category()
    {
        return $this->belongsTo('Facilinfo\Blog\Models\BlogCategory', 'category_id');
    }




    /*public function comments()
    {
        return $this->hasMany('App\Comment', 'on_post');
    }

    public static function boot()
    {
        parent::boot();

        // cause a delete of a post to cascade to children so they are also deleted
        static::deleted(function($post)
        {
            $post->comments()->delete();

        });
    }
    */


}
