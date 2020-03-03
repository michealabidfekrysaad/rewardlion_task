<?php

namespace App\Http\Controllers;

use App\reports;
// use Facade\FlareClient\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Recipes.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'Name' => 'required|unique:reports|max:20',
            'image'  => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'Description' => 'required|min:10|max:50'
        ]);

        $image = $request->file('image');
        $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_image_name);
        $report = new reports();
        $report->name = request()->Name;
        $report->image = $new_image_name;
        $report->description = request()->Description;
        $report->save();
        return back()->with('success', 'Recipe Added Successfully')->with('path', $new_image_name);
    }

    public function showAll()
    {
        $reports = reports::paginate(5);


        // dd($reports);
        return view('Recipes.index', ['reports' => $reports]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = reports::find($id);
        // dd($report);
        return view('Recipes.show', ['report' => $report]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = reports::find($id);

        return view('Recipes.edit', ['report' => $report]);
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
        $report = reports::find($id);

        $this->validate($request, [
            'Name' => 'unique:reports,name,'.$report->id.',id',
            'image'  => 'image|mimes:jpg,png,jpeg|max:2048',
            'Description' => 'min:10|max:90'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_image_name);
            $report->image = $new_image_name;
        }

        $report->name = request()->Name;
        $report->description = request()->Description;
        $report->save();
        return redirect()->route('Reports.index');


    }

    /**
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = reports::find($id);
        $report->delete();
        return back();
    }
}
