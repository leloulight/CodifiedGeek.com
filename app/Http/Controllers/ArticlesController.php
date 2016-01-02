<?php

namespace Backoffice\Http\Controllers;

use Illuminate\Http\Request;

use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\Article;
use Backoffice\Http\Requests\ArticleRequest;
use File;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        //

        $article = new Article(array(
           'title' => $request->get('name'),
            'body' => $request->get('body'),
            'image' => $request->get('image'),
            'thumbimage' => $request->get('thumbimage')
        ));

        $article->save();


        $request->file('image')->move(
            base_path() . '/public/images/article/', $article->image
        );

        $request->file('thumbimage')->move(
            base_path() . '/public/images/article/thumbs/', $article->thumbimage
        );

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        //get the current files
        $oldFile = $article->image;
        $oldThumb = $article->thumbimage;

        $article->title = $request->title;
        $article->body = $request->body;

        if($request->file('image')) { //client has uploaded a new file
            $article->image = $request->file('image')->getClientOriginalName();

            File::delete(base_path() . '/public/images/article/'.$oldFile);//delete the old image

            //move uploaded file to article dir
            $request->file('image')->move(
                base_path() . '/public/images/article/', $request->file('image')->getClientOriginalName()
            );

        }

        if($request->file('thumbimage')) { //client has uploaded a new file
            $article->thumbimage = $request->file('thumbimage')->getClientOriginalName();

            File::delete(base_path() . '/public/images/article/thumb/'.$oldThumb);//delete the old image

            //move uploaded file to article dir
            $request->file('thumbimage')->move(
                base_path() . '/public/images/article/thumb/', $request->file('thumbimage')->getClientOriginalName()
            );

        }
        $article->update();

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
