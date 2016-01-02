<?php

namespace Backoffice\Http\Controllers;

use Illuminate\Http\Request;

use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\Skill;
use Backoffice\SkillCategory;

class SkillsController extends Controller
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

        return view('skills.index',compact('skillcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //get the skill categories
        $skill_categories = SkillCategory::lists('title','id');

        return view('skills.create',compact('skill_categories'));
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
            'skill_category_id' => 'required',
            'skilltitle' => 'required',
            'yearsexp' => 'required',
        ]);

        Skill::create($request->all());

        return redirect('skills')->with('success', 'Successfully created a new skill!');
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
        $skill = Skill::findOrFail($id);
        $skill_categories = SkillCategory::lists('title','id');

        return view('skills.edit',compact('skill','skill_categories'));
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
            'skill_category_id' => 'required',
            'skilltitle' => 'required',
            'yearsexp' => 'required',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update($request->all());

        return redirect('skills')->with('success', 'Successfully updated skill!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect('skills')->with('success', 'Successfully deleted skill!');
    }
}
