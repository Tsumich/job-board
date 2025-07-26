<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{

    use AuthorizesRequests;

    public function create(Work $job)
    {

        return view('job_application.create', ['job' => $job]);
    }


    public function store(Work $job, Request $request)
    {
        $this->authorize('apply', $job);

        $valivatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:100000',
            'cv' => 'required|file|mimes:pdf:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $job->jobApplication()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $valivatedData['expected_salary'],
            'cv_path' => $path
            // ... $request->validate([
            //     'expected_salary'=> 'required|min:1|max:100000',
            // ])
        ]);
        return redirect()->route("jobs.show", $job)
            ->with('success', 'Вакансия создана');
    }

    public function destroy(string $id)
    {
        //
    }
}
