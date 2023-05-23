<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $nbrPerPage = 4;

    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('admin')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =  Post::paginate($this->nbrPerPage);
        $links = $posts->links();

        return view('posts.liste', compact('posts', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if ($request->validated()) {
            $newPost = new Post($request->input());
            $newPost->user_id = Auth::user()->id;
            $newPost->save();
            return redirect(route('post.index'));
        }
        return redirect()->back()->withErrors(['error' => $request->validated()]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
