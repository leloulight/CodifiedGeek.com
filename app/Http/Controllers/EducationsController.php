<?php

namespace Backoffice\Http\Controllers;

use Illuminate\Http\Request;

use Backoffice\Http\Requests;
use Backoffice\Http\Controllers\Controller;
use Backoffice\Education;

class EducationsController extends Controller
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
        $educations = Education::latest()->get();
        return view('educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('educations.create');
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
                'schoolname' => 'required',
                'startyear' => 'required|date_format:Y',
                'graduationyear' => 'required|date_format:Y',
                'degree' => 'required',
                'currentlyenrolled' => 'required|max:1|numeric|min:0',
            ]);

        Education::create($request->all());

        return redirect('educations')->with('success', 'Successfully saved education!');
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
        $education = Education::findOrFail($id);

        return view('educations.edit', compact('education'));
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
            'schoolname' => 'required',
            'startyear' => 'required|date_format:Y',
            'graduationyear' => 'required|date_format:Y',
            'degree' => 'required',
            'currentlyenrolled' => 'required|max:1|numeric|min:0',
        ]);
        $education = Education::findOrFail($id);

        $education->update($request->all());

        return redirect('educations')->with('success', 'Successfully updated education!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect('educations')->with('success', 'Successfully deleted education!');
    }
}
