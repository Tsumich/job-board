<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    use HasFactory;

    protected $fillable = [
        'title', 'location', 'salary', 'description', 'expirience', 'category'
    ];

    public function index(Request $request)
    {
        return view('my_job.index', [
            'works' => request()->user()->employer->works()
            ->with(['employer', 'jobApplication', 'jobApplication.user'])
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkRequest $request)
    {

        $request->user()->employer->works()->create($request->validated());

        return redirect()->route('my-jobs.index')->with(
            'success',
            'Job created'
        );
    }

    public function edit(Work $myJob)
    {
        return view('my_job.edit', ['work' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkRequest $request, Work $myJob)
    {
        $myJob->update($request->validated());
        return redirect()->route('my-jobs.index')->with(
            'success',
            'Job created'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
