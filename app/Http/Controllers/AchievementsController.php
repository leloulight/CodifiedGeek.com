<?php

namespace Backoffice\Http\Controllers;

use Illuminate\Http\Request;

use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\Job;
use Backoffice\Achievement;

class AchievementsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $job = Job::findOrFail($id);
        return view('achievements.create', compact('job'));
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
            'job_id' => 'required',
            'description' => 'required',
            'url' => 'url'
        ]);

        Achievement::create($request->all());

        return redirect('jobs')->with('success', 'Successfully saved achievement!');
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
        $achievement = Achievement::findOrFail($id);

        return view('achievements.edit', compact('achievement'));
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
            'description' => 'required',
            'job_id' => 'required',
        ]);

        $achievement = Achievement::findOrFail($id);

        $achievement->update($request->all());

        return redirect('jobs')->with('success', 'Successfully updated achievement!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return redirect('jobs')->with('success', 'Successfully deleted achievement!');;

    }
}
