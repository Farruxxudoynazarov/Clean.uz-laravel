<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Mail\PostCreated as MailPostCreated;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostCreated as NotificationsPostCreated;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
     }




    public function index()
    {
        $posts = Post::paginate(6);
        return view('posts.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.creat')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {



    
        if($request->hasFile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }
        // dd($request);
        $posts = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,
        ]);

        if(isset($request->tags)){
            foreach ($request->tags as $tag) {
                $posts->tags()->attach($tag);
            }
        }





        PostCreated::dispatch($posts);

        Mail::to($request->user())->send(new MailPostCreated($posts));

        Notification::send(auth()->user(), new NotificationsPostCreated($posts));

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [$post])->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->take(2),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $this->authorize('update', $post);
        // Gate::authorize('update', $post);

        return view('posts.edit')->with(['post' => $post]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    { 
        Gate::authorize('update', $post); 

        if($request->hasFile('photo')){
            if(isset($post->photo)){
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }
    $post->update([
       'title' => $post->title,
       'short_content' => $request->short_content,
       'content' => $request->content,
       'photo' => $path ?? $post->photo,
]);

 return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(isset($post->photo)){
            Storage::delete($post->photo);
        }
     $post->delete();
     return redirect()->route('posts.index');   
    }
}
