<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Category;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("id", "desc")->paginate(15);
        return view('admin/posts/index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::All();
        return view('admin/posts/create', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'unique:posts|required|max:20',
            'description' => 'required|min:10',
        ]);
        $data = $request->all();

        $newPost = new Post();
        $newPost->title = $data["title"];
        $newPost->user = Auth::user()->name;
        $newPost->description = $data["description"];
        $newPost->url = $data["url"];
        $newPost->slug = Str::slug($data["title"],"-");
        $newPost->save();
        $newPost->categories()->sync($data['category_id']);

        return redirect()->route("admin.posts.show", $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view("admin/posts/edit",compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|min:2',
        ]);
        $data = $request->all();

        $post->title = $data["title"];
        $post->description = $data["description"];
        $post->url = $data["url"];
        $post->slug = Str::slug($data["title"],"-");
        $post->categories()->sync($data['category_id']);
        $post->save();

        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        $post->delete();
        return redirect()->route('admin.posts.index',compact("post"))->with("message","$post->title è stato eliminato con successo!");    
    }
}
