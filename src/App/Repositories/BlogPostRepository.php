<?php

namespace Facilinfo\Blog\App\Repositories;

use Facilinfo\Blog\Models\BlogPost;
use Illuminate\Support\Str;
use Auth;
use App\User;
use DB;
use Illuminate\Contracts\Mail\Mailer;

class BlogPostRepository
{
    protected $post;

    public function __construct(Mailer $mailer, BlogPost $post)
    {
        $this->mailer = $mailer;
        $this->post = $post;


    }

    public function notify($id){

        $post=BlogPost::where('id', '=', $id)->firstOrFail();
        if(!$post->notification_sent){

            $users=User::where('notify_me', '=', true)->get();
            foreach($users as $user){
                $this->mailer->send(['emails.html-notify', 'emails.text-notify'],compact('user', 'post'), function($message) use ($user) {
                    $message->to($user->email)->subject('Un nouvel article est en ligne');
                });
            }



        }
    }

    private function save(BlogPost $post, Array $inputs)
    {
        $post->user_id = Auth::user()->id;
        $post->title = ucfirst($inputs['title']);
        $post->body = $inputs['body'];
        $post->slug = Str::slug($inputs['title'], '-');
        if(isset( $inputs['active'])) $active=1; else $active=0;
        $post->active = $active;
        $post->category_id=$inputs['category_id'];


        $post->save();
        if($post->active && !$post->notification_sent)
        {
            $this->notify($post->id);
            $post->notification_sent=true;

            $post->save();
        }

    }

    private function modif(BlogPost $post, Array $inputs)
    {
        $post->title = ucfirst($inputs['title']);
        $post->body = $inputs['body'];
        $post->slug = Str::slug($inputs['title'], '-');
        if(isset( $inputs['active'])) $active=1; else $active=0;
        $post->active = $active;
        $post->category_id = $inputs['category_id'];

        $post->save();

        if($post->active && !$post->notification_sent)
        {
            $this->notify($post->id);
            $post->notification_sent=true;

            $post->save();
        }
    }

    public function get()
    {
        $posts= $this->post->with('user', 'category')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return $posts;
    }

    public function getLastBlogPosts($n){
        return $this->post
            ->with('category')->take($n)
            ->where('active', '=', 1)
            ->orderBy('created_at','DESC')
            ->get();
    }

    public function getPaginate($n)
    {
        return $this->post->with('user')
            ->where('active', '=', true)
            ->orderBy('posts.created_at', 'desc')
            ->paginate($n);
    }


    public function getByCategory($id, $n){
        return $posts=BlogPost::with('category')
            ->where('category_id', '=', $id)
            ->where('active', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate($n);
    }

    public function getByMonth($month, $year, $n){
        $posts=BlogPost::with('category')
            ->where(DB::raw('MONTH(created_at)'), '=', $month)
            ->where(DB::raw('YEAR(created_at)'), '=', $year)
            ->where('active', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate($n);
        return $posts;
    }


    public function store(Array $inputs)
    {

        $post = new $this->post;


        $this->save($post, $inputs);

        return $post;
    }

    public function getById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function getBySlug($slug)
    {
        return $this->post->with('comments')
            ->with('user')
            ->where('slug','=',$slug)
            ->where('active', '=', 1)
            ->firstOrFail();
    }



    public function update($id, Array $inputs)
    {

        $this->modif($this->getById($id), $inputs);
    }



    public function destroy($id)
    {
        //Manually delete comments as posts table doesn't accept foreign key (MyISAM engine for Fulltext search on posts)
        /*$comments = $this->getComments($id);
        if ($comments != null) {
            foreach ($comments as $comment) {
                $comment->delete();
            }
        }
*/
        $post=$this->getById($id);


        $post->delete();
    }

    public function search($input, $n){


        $result=BlogPost::selectRaw("*, MATCH(title, body) AGAINST('$input' IN BOOLEAN MODE) as pertinence")
            ->whereRaw("MATCH(title, body) AGAINST('$input' IN BOOLEAN MODE)")
            ->where('active', '=', true)
            ->orderByRaw("pertinence DESC")
            ->paginate($n);

        return $result;
    }

}