<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployerController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // созданный работник будет ассоироваться с юзером
        $request->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique|employers,company_name'
            ])
        );
        return redirect()->route('jobs.index')
            ->with('success', 'Ваш аккаунт работника был создан');
    }

   
}
