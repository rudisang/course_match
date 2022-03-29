<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\ProgramRequirement;

class AdminDashboardController extends Controller
{
    //

    public function allPrograms()
    {
        $programs = Program::withCount('requirements')->get();
        return view('dashboard.admin.programs.index', compact('programs'));
        
    }

    public function addProgram(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'type' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'required',
            'min_points' => 'required',
        ]);

        
        //create a new program
        $program = new Program;
        $program->type = $request->type;
        $program->degree = $request->degree;
        $program->name = $request->name;
        $program->faculty = $request->faculty;
        $program->description = $request->description;
        $program->duration = $request->duration;
        $program->min_points = $request->min_points;
        $program->save();

        return redirect('/admin/programs')->with('success', 'New Program Added');
    }

    public function addProgramRequirement(Request $request)
    {
        //validate request
        $this->validate($request, [
            'program_id' => 'required',
            'subject' => 'required',
            'min_points' => 'required',
        ]);

        //create new program requirement
        $program_requirement = new ProgramRequirement;
        $program_requirement->program_id = $request->program_id;
        $program_requirement->subject = $request->subject;
        $program_requirement->min_points = $request->min_points;
        $program_requirement->save();

        //redirect to program requirements page
        return redirect('/admin/programs')->with('success', 'New Requirement Added');
    }
}
