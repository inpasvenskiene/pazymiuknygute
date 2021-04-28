<?php

namespace App\Http\Controllers;

use App\Models\lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('lectures.index', ['lectures' => lecture::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lectures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lecture = new lecture();
        // can be used for seeing the insides of the incoming request
            // dd($request->all()); die();
           $lecture->fill($request->all());
           $lecture->save();
           return redirect()->route('lectures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(lecture $lecture)
    {
        return view('lectures.edit', ['lecture' => $lecture]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lecture $lecture)
    {
        $lecture->fill($request->all());
        $lecture->save();
        return redirect()->route('lectures.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(lecture $lecture)
    {
        $lecture->delete();
        return redirect()->route('lectures.index');
    }
}
