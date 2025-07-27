<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = Work::query();
        // ищет совпадения в заголовке или в описании работы
        $filters = request()->only(
            'search', 'min_salary', 'max_salary', 'expirience', 'category'
        );

        return view('job.index', ['jobs' => Work::with('employer')->latest()->filter($filters)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Work $job)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Work $job)
    {
        //return view('job.show', compact('job'));
        return view(
            'job.show', 
            ['job' => $job->load('employer.works')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
