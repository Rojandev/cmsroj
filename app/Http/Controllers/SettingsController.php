<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Pages;
use Session;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = Settings::find(1);
        $pages =  Pages::all();
        return view('cms.settings.settingsView',compact('settings','pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $settings = new Settings;
        $settings->fill($request->all());
        $settings->save();

        $home = Pages::findOrFail($request->home_page);
        $home->type = 'home';
        $home->save();

        return redirect('admin/settings')->with('success', 'Settings saved.');

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
        $settings = Settings::findOrFail($id);
        $settings->fill($request->all());
        $settings->save();

        $this->homeblogPageSettings($request->home_page,'home');
        $this->homeblogPageSettings($request->blog_page,'blog');

        return redirect('admin/settings')->with('success', 'Settings saved.');
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

    public function homeblogPageSettings($id, $type){

        if($id != null){
            $pages = Pages::where('type', $type)->get(); 
            if(count($pages) > 0){
              foreach($pages as $page){
                    //Check if they have same ID
                    if($page->id != $id){
                        //Change the last Page page type to page
                        $set_to_page = Pages::findOrFail($page->id);
                        $set_to_page->type = 'page';
                        $set_to_page->save();
                        //Change the current Page page type to blog 
                        $set_to_type = Pages::findOrFail($id);
                        $set_to_type->type = $type;
                        $set_to_type->save();
                    }
                }
            }else{
                $pages = Pages::findOrFail($id);
                $pages->type = $type;
                $pages->save();
            }
        }else{
            $pages = Pages::where('type', $type)->get();
            if(count($pages) > 0){
              foreach($pages as $page){
                    //Check if they have same ID
                    if($page->id != $id){
                        //Change the last Page page type to page
                        $set_to_page = Pages::findOrFail($page->id);
                        $set_to_page->type = 'page';
                        $set_to_page->save();
                    }
                }
            }
        }

    }
}
