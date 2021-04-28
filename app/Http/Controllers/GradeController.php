<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Models\lecture;
use App\Models\student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('grades.index', ['grades' => Grade::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create', [
            'students' => Student::orderBy('surname')->get(),
            'lectures' => Lecture::orderBy('name')->get()
        ]);
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
            'grade' => 'required|lte:10|gte:0',
            'student_id' => 'required',
            'lecture_id' => 'required',
        ]);

        $grade = new Grade();
        $grade->fill($request->all());

        return $grade->save() !== 1 ?
            redirect()->route('grades.index')->with('status_success', "Grade added!") :
            redirect()->route('grades.index')->with('status_error', "Grade was not added!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(grade $grade)
    {
        return view('grades.edit', [
            'grade' => $grade,
            'students' => Student::orderBy('surname')->get(),
            'lectures' => Lecture::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, grade $grade)
    {
        $this->validate($request, [
            'grade' => 'required|lte:10|gte:0',
            'student_id' => 'required',
            'lecture_id' => 'required',
        ]);

        $grade->fill($request->all());

        return $grade->save() !== 1 ?
            redirect()->route('grades.index')->with('status_success', "Grade Updated!") :
            redirect()->route('grades.index')->with('status_error', "Grade was not updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(grade $grade)
    {
        return $grade->delete()?
            redirect()->route('grades.index')->with('status_success', "Grade Deleted!") :
            redirect()->route('grades.index')->with('status_error', "Grade was not deleted!");
    }
}
