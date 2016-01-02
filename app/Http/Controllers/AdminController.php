<?php

namespace Backoffice\Http\Controllers;

use Backoffice\Article;
use Illuminate\Http\Request;

use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\Education;
use Backoffice\Job;
use Backoffice\Achievement;
use Backoffice\Skill;
use Backoffice\SkillCategory;

class AdminController extends Controller
{

    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //load the home page of all models for resume entry
        $educations = Education::orderBy('graduationyear', 'desc')->get();
        $skillcategories = SkillCategory::orderBy('title','asc')->get();
        $jobs = Job::orderBy('currentlyemployed','desc')->orderBy('enddate','desc')->get();
        $article = Article::findOrFail('1');//get the summary article with id of 1


        return view('admin.index',compact('educations','jobs','skillcategories', 'article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
