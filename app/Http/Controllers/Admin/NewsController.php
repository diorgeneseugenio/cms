<?php

namespace CMS\Http\Controllers\Admin;

use CMS\Forms\NewsForm;
use CMS\Models\News;
use Illuminate\Http\Request;
use CMS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(NewsForm::class, [
            'url' => route('admin.news.store'),
            'method' => 'POST'
        ]);

        return view('admin.news.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(NewsForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        $nameFile = "";
        $hasFile = false;

        if ($request->hasFile('banner')) {
            if ($request->file('banner')->isValid()) {
                $banner = $request->file('banner');
                $nameFile = $banner->getClientOriginalName();
                $hasFile = true;
            }
        }

        $data["data"] = date("Y-m-d", strtotime($data["data"]));
        $data["banner"] = $nameFile;
        $data["ativo"] = "Sim";

        $id = News::create($data)->id;

        if($hasFile){
            Storage::disk('local')->put('news/'.$id.'/'.$nameFile, file_get_contents($banner->getRealPath()));
        }

        return redirect()
            ->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \CMS\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CMS\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $form = \FormBuilder::create(NewsForm::class, [
            'url' => route('admin.news.update', ['news' => $news->id]),
            'method' => 'PUT',
            'model' => $news
        ]);

        return view('admin.news.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CMS\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $form = \FormBuilder::create(NewsForm::class, [
            'data' => [
                'id' => $news->id,
                'ativo' => $news->ativo
            ]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        $news->update([
            'titulo' => $data["titulo"],
            'categoria' => $data["categoria"],
            'data' => date("Y-m-d", strtotime( $data["data"])),
            'resumo' => $data["resumo"],
            'conteudo' => $data["conteudo"],
            'ativo' => $data["ativo"],
        ]);

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CMS\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
