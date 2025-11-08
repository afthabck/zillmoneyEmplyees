<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Languages;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::with(['knownLanguages'])->get();
        // dd($employees);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Languages::all();
        return view('employees.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $languages = Languages::whereIn('id', $request->languages)->pluck('language_name')->toArray();
        if ($request->input('willing_to_work') !== 'on') {
            $willing = 'No';
        } else {
            $willing = 'Yes';
        }
        $employee =    Employees::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'willing_to_work' =>  $willing,
        ]);
        if ($employee) {
            foreach ($languages as $language) {
                $employee->load('knownLanguages')->knownLanguages()->create([
                    'language_id' => Languages::where('language_name', $language)->first()->id
                ]);
            }
        }
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
