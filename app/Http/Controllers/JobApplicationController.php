<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Work $job)
    {
        return view('job_application.create', ['job' => $job]);
    }


    public function store(Request $request)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
