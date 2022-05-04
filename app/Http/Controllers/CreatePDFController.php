<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePDFController extends Controller
{
    public function __invoke($program_id)
    {
        $program = Program::find($program_id);
        $requirements = $program->requirements;
        $pdf = \PDF::loadView('pdf.program', compact('program', 'requirements'));
        return $pdf->download('program.pdf');
    }
}
