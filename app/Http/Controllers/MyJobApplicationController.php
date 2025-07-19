<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view(
            'my_job_application.index', 
            [
                'applications' => Auth::user()->jobApplications()
                   // ->with('work', 'work.employer')
                    ->with([
                        'work' => fn($query) => $query->withCount('jobApplication')
                            ->withAvg('jobApplication', 'expected_salary'),
                        'work.employer'
                    ])
                     ->latest()->get()
            ]
        );
    }

   
    public function destroy(string $id)
    {
        //
    }
}
