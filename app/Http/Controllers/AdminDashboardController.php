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
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to view this page');
        }else{
        $programs = Program::withCount('requirements')->get();
        return view('dashboard.admin.programs.index', compact('programs'));
        }
    }

    public function addProgram(Request $request)
    {
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to perform this action');
        }else{
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
    }

    public function editProgram($id)
    {
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to perform this action');
        }else{
        $program = Program::find($id);
        return view('dashboard.admin.programs.edit', compact('program'));
        }
    }

    public function updateProgram(Request $request, $id)
    {
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to perform this action');
        }else{
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
        $program = Program::find($id);
        $program->type = $request->type;
        $program->degree = $request->degree;
        $program->name = $request->name;
        $program->faculty = $request->faculty;
        $program->description = $request->description;
        $program->duration = $request->duration;
        $program->min_points = $request->min_points;
        $program->save();

        return redirect('/admin/programs')->with('success', 'Program Updated');
        }
    }

    public function destroyProgram($id)
    {
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to perform this action');
        }else{
        $program = Program::find($id);

        foreach($program->requirements as $requirement){
            $requirement->delete();
        }
        $program->delete();
        return redirect('/admin/programs')->with('success', 'Program Deleted');
        }
    }

    public function addProgramRequirement(Request $request)
    {
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to view this page');
        }else{
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

    public function destroyProgramRequirement($id)
    {
        if(auth()->user()->is_admin == false){
            return redirect('/dashboard')->with('error', 'You are not authorized to view this page');
        }else{
        $program_requirement = ProgramRequirement::find($id);
        $program_requirement->delete();

        return redirect('/admin/programs')->with('success', 'Requirement Deleted');
        }
    }
}
