<?php

namespace Backoffice\Http\Controllers;

use Illuminate\Http\Request;

use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\SkillCategory;
use Backoffice\Skill;

class SkillCategoriesController extends Controller
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
        $skillcategories = SkillCategory::orderBy('title','asc')->get();
        return view('skillcategories.index',compact('skillcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('skillcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        SkillCategory::create($request->all());

        return redirect('skillcategories')->with('success', 'Successfully created a new category!');
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
        $skillcategory = SkillCategory::findOrFail($id);
        return view('skillcategories.edit',compact('skillcategory'));
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $skillcategory = SkillCategory::findOrFail($id);
        $skillcategory->update($request->all());

        return redirect('skillcategories')->with('success','Successfully updated category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $skillcategory = SkillCategory::findOrFail($id);
        $skills = SkillCategory::findOrFail($id)->skills()->get();
        if($skills->isEmpty()) {
            $skillcategory->delete();
            return redirect('skillcategories')->with('success', 'Successfully deleted category!');
        } else {
            //can't delete the category until all of the skills are removed or changed
            return redirect('skillcategories')->with('error', 'There was a problem removing the category, since there are existing skills tied to the category.');
        }

    }
}
