<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateGrades;
use App\Models\Program;
use App\Models\User;
use App\Models\Comment;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade as PDF;


class DashboardController extends Controller
{
    public function createGrades()
    {
        return view('dashboard.student-views.mygrades.create');
    }

    public function calcPoints($grade){
        $points = 0;
        switch ($grade) {
            case 'A*A*':
                $points = 16;
                break;
            case 'AA':
                $points = 16;
                break;
            case 'BB':
                $points = 14;
                break;
            case 'CC':
                $points = 12;
                break;
            case 'DD':
                $points = 10;
                break;
            case 'EE':
                $points = 8;
                break;
            case 'FF':
                $points = 6;
                break;
            case 'A*':
                $points = 8;
                break;
            case 'A':
                $points = 8;
                break;
            case 'B':
                $points = 7;
                break;
            case 'C':
                $points = 6;
                break;
            case 'D':
                $points = 5;
                break;
            case 'E':
                $points = 4;
                break;
            case 'F':
                $points = 3;
                break;
            default:
                $points = 0;
                break;
        }
        return $points;
    }

    public function storeGrades(Request $request)
    {
       

        $grade = new CandidateGrades();
        $grade->subject = $request->subject_one;
        $grade->grade = $request->grade_one;
        $grade->points = $this->calcPoints($request->grade_one);
        $grade->user_id = auth()->user()->id;

        

        $gradeb = new CandidateGrades();
        $gradeb->subject = $request->subject_two;
        $gradeb->grade = $request->grade_two;
        $gradeb->points = $this->calcPoints($request->grade_two);
        $gradeb->user_id = auth()->user()->id;

        $gradec = new CandidateGrades();
        $gradec->subject = $request->subject_three;
        $gradec->grade = $request->grade_three;
        $gradec->points = $this->calcPoints($request->grade_three);
        $gradec->user_id = auth()->user()->id;

        $graded = new CandidateGrades();
        $graded->subject = $request->subject_four;
        $graded->grade = $request->grade_four;
        $graded->points = $this->calcPoints($request->grade_four);
        $graded->user_id = auth()->user()->id;

        $gradee = new CandidateGrades();
        $gradee->subject = $request->subject_five;
        $gradee->grade = $request->grade_five;
        $gradee->points = $this->calcPoints($request->grade_five);
        $gradee->user_id = auth()->user()->id;

        $gradef = new CandidateGrades();
        $gradef->subject = $request->subject_six;
        $gradef->grade = $request->grade_six;
        $gradef->points = $this->calcPoints($request->grade_six);
        $gradef->user_id = auth()->user()->id;

        $gradeg = new CandidateGrades();
        $gradeg->subject = $request->subject_seven;
        $gradeg->grade = $request->grade_seven;
        $gradeg->points = $this->calcPoints($request->grade_seven);
        $gradeg->user_id = auth()->user()->id;

        $gradeh = new CandidateGrades();
        $gradeh->subject = $request->subject_eight;
        $gradeh->grade = $request->grade_eight;
        $gradeh->points = $this->calcPoints($request->grade_eight);
        $gradeh->user_id = auth()->user()->id;

        $gradei = new CandidateGrades();
        $gradei->subject = $request->subject_nine;
        $gradei->grade = $request->grade_nine;
        $gradei->points = $this->calcPoints($request->grade_nine);
        $gradei->user_id = auth()->user()->id;


        $grade->save();
        $gradeb->save();
        $gradec->save();
        $graded->save();
        $gradee->save();
        $gradef->save();
        $gradeg->save();
        $gradeh->save();
        $gradei->save();

        return redirect()->route('mygrades')->with('success', 'Grade added successfully');
    }

    public function dashboard(){
        
        if(auth()->user()->is_admin){
            $programs = Program::all();
            $users = User::all();
            $comments = Comment::all();
            return view('dashboard.admin.index')->with('programs', $programs)->with('comments', $comments)->with('users', $users);
        }else{
            $points = $this->points();
            $programs = Program::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(18)->withQueryString();
            return view('dashboard.student-views.index', compact('programs'))->with('points', $points);
        }
    }

    public function showProgram($id){
        $points = $this->points();
        $program = Program::with('requirements')->withCount('comments')->find($id);
        $comments = Comment::where('program_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('dashboard.student-views.program.show', compact('program'), compact('comments'))->with('points', $points);
    }

    public function addComment(Request $request, $id){
        //validate the data
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $program = Program::find($id);
        if($program != ""){
            $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->program_id = (int)$id;
        $comment->comment = $request->comment;

        
        $comment->save();

            sleep(2);
        return back()->with('success', 'Comment added successfully');
        }else{
            return back()->with('error', 'Program not found');
        }
        
    }

    public function removeComment($id){
        $comment = Comment::find($id);
        if($comment != ""){
            $comment->delete();
            return back()->with('success', 'Comment removed successfully');
        }else{
            return back()->with('error', 'Comment not found');
        }
    }


    public function makePDF($id){
        $points = $this->points();
        $program = Program::with('requirements')->find($id);
        $html = view('pdf', compact('program'))->with('points', $points);
       // return view('pdf', compact('program'))->with('points', $points);

       //$pdf = PDF::loadHtml($html);
        
        //return $pdf->stream();

        //$pdf = App::make('snappy.pdf.wrapper');
        //dd($html);
        //PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 0)->save('myfile.pdf');
       $pdf = PDF::loadView('pdf', compact('program'), compact('points'));
       
       return $pdf->download('program.pdf');
        
        
        //return view('pdf', compact('program'))->with('points', $points);

    }

    public function sortArr(){
        $has_sda = false;
        $points_array = [];
        $sorted = auth()->user()->grades->sortByDesc('points');

        foreach ($sorted as $grade) {
            if($grade->subject == 'SDA'){
                $has_sda = true;
            }
        }

        
        if($has_sda){
            $points_array = $sorted->splice(5);
          }else{
            $points_array = $sorted->splice(6);
          }

         
          return $sorted;

    }

    public function points(){
        $points = 0;
        foreach($this->sortArr() as $grades){
            $points += $grades->points;
        }
        return $points;
    }
}
