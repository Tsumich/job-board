<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    use HasFactory;

    protected $fillable = [
        'title', 'location', 'salary', 'description', 'expirience', 'category'
    ];

    public function index()
    {
        return view('my_job.index');
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
    public function store(Request $request)
    {
        error_log('111dfgdfg');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|max:5000',
            'description' => 'required|string',
            'expirience' => 'required|in:' . implode(',', Work::$expirience),
            'category' => 'required|in:' . implode(',', Work::$category),
        ]);
error_log('dfgdfg');
        $request->user()->employer->works()->create($validatedData);

        return redirect()->route('my-jobs.index')->with(
            'success',
            'Job created'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
