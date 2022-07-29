<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;
class PostController extends Controller
{   
    private $validation = [
        'author_name' => 'required|string|max:50',
        'author_lastname' => 'nullable|string|max:50',
        'title' => 'required|string|max:100',
        'content' => 'required|string|max:65535',
        'is_published' => 'sometimes',
        'category_id' => 'nullable|exists:categories,id', //if category_id is selected it must be exists in table called categories
        'tags' => 'array|exists:tags,id',
        'images' => 'nullable|image|max:1024'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $user = Auth::user();
        $posts = $user->posts;

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();
        $newPost = new Post();
        $newPost->fill($data);        
        
        $slug = Str::of($data['title'])->slug('-');
        $count = 1;

        while(Post::where('slug', $slug)->first()) {
            $slug = Str::of($data['title']) . "-{$count}";
            $count++;
        }
        $newPost->slug = $slug;

        $newPost->is_published = isset($data['is_published']);

        $newPost->user_id = Auth::id();

        if(isset($data['image'])) {
            $newPost->image = Storage::put('uploads', $data['image']);
        }
        
        $newPost->save();
        if(isset($data['tags'])) {
            $newPost->tags()->sync($data['tags']);
        }
        
        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        ($post->user_id == Auth::id())?: abort(403);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        ($post->user_id == Auth::id())?: abort(403);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validation);

        $data = $request->all();
        $post->fill($data);
        //slug method to fix
        $slug = Str::of($data['title'])->slug('-');
        $count = 1;

        if ($post->title != $data['title']) {
            while(Post::where('slug', $slug)->first()) {
                $slug = Str::of($data['title']) . "-{$count}";
                $count++;
            }
            $post->slug = $slug;
        }
        //---end slug method to fix
        $post->is_published = isset($data['is_published']);

        if(($post->image != null)) {
            Storage::delete($post->image);
        }
        $post->image = Storage::put('uploads', $data['image']);
        
        $post->save();

        if(isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        ($post->user_id == Auth::id())?: abort(403);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

}
