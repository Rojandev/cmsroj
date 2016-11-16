<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $posts = Posts::paginate(15);
        foreach($posts as $key => $value){
            if(!empty($value->tags)){
                $tags[] = unserialize($value->tags);
            }else{
                $tags[] = '';
            }
        }
        if($request->exists('category')){
            return view('cms.posts.category.categoryList');
        }else{

        return view('cms.posts.postsList', compact('posts','tags'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.posts.postsView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Posts;
        $post->fill($request->all());

        if(empty($request->slug)){
            $post->slug = str_slug($request->title,'-');
        }

        $post->author = Auth::user()->name;
        $post->save();

        return redirect('admin/posts/'.$post->id.'/edit')->with('success', 'Post created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Posts::findOrFail($id);
        $tags = unserialize($post->tags);

        return view('cms.posts.postsView', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);
        $post->fill($request->all());
        $post->tags = serialize($request->tags);
        if(empty($request->slug)){
            $post->slug = str_slug($request->title,'-');
        }

        $post->save();

        return redirect('admin/posts/'.$post->id.'/edit')->with('success', 'Post Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
