<?php

namespace Backoffice\Http\Controllers;

use Illuminate\Http\Request;
use Backoffice\Job;
use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\Http\Requests\JobsRequest;

class JobsController extends Controller
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
        $jobs = Job::latest()->get();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('jobs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->currentlyemployed == 1) {
            $this->validate($request, [
                'company' => 'required',
                'jobtitle' => 'required',
                'currentlyemployed' => 'required',
                'startdate' => 'required',
                'jobdescription' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'company' => 'required',
                'jobtitle' => 'required',
                'currentlyemployed' => 'required',
                'startdate' => 'required',
                'enddate' => 'required',
                'jobdescription' => 'required'
            ]);
        }


        Job::create($request->all());

        return redirect('jobs')->with('success', 'Successfully saved job!');
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
        $job = Job::findOrFail($id);

        return view('jobs.edit', compact('job'));
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
        if($request->currentlyemployed == 1) {
            $this->validate($request, [
                'company' => 'required',
                'jobtitle' => 'required',
                'currentlyemployed' => 'required',
                'startdate' => 'required',
                'jobdescription' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'company' => 'required',
                'jobtitle' => 'required',
                'currentlyemployed' => 'required',
                'startdate' => 'required',
                'enddate' => 'required',
                'jobdescription' => 'required'
            ]);
        }
        $job = Job::findOrFail($id);

        $job->update($request->all());

        return redirect('jobs')->with('success', 'Successfully updated job!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        $job->achievements()->delete();
        return redirect('jobs')->with('success', 'Successfully deleted job!');
    }
}
