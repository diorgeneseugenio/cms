<?php

namespace CMS\Http\Controllers;

use CMS\Models\News;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all()
            ->where('ativo', '=', 'Sim')
            ->sortByDesc('data');
        return view('blog', compact('news'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::all()
                    ->where('id', '=', $id);
        return view('news', compact('news'));

    }

}
