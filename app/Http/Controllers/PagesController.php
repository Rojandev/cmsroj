<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pages;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Pages::paginate(15);
        return view('cms.pages.pagesList', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.pages.pagesView');
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
       $page = new Pages;
       $page->fill($request->all());

        if(empty($request->slug)){
            $page->slug = str_slug($request->title,'-');
        }

       $page->type = 'page';
       $page->author = Auth::user()->name;
       
       $page->save();

        return redirect('admin/pages/'.$page->id.'/edit')->with('success', 'Page created.');

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
        $page = Pages::findOrFail($id);

        return view('cms.pages.pagesView', compact('page'));

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
        //
        $page = Pages::findOrFail($id);
        $page->fill($request->all());
        if(empty($request->slug)){
            $page->slug = str_slug($request->title,'-');
        }
        $page->save();

        return redirect('admin/pages/'.$id.'/edit')->with('success', 'Page updated.');
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
