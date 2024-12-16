<?php

namespace App\Http\Controllers;

use App\Models\Involtage;
use Illuminate\Http\Request;

class InvoltageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Take search parameter from URL 
        $search = $request->input('search', '');

        // Filter by name, location, and voltage
        $involtages = Involtage::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('location', 'like', '%' . $search . '%')
                        ->orWhere('voltage', 'like', $search );
            })
            ->paginate(3);

        return view(
            'involtage.index', 
            [
                'involtages' => $involtages,
                'search' => $search,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('involtage.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'voltage' => ['required', 'numeric', 'min:0'],
            'information' => ['required', 'string', 'max:500'],
        ]);

        Involtage::create([
            'name' => $request->name,
            'location' => $request->location,
            'voltage' => $request->voltage,
            'information' => $request->information,
        ]);

        return redirect()->route('involtage.index')->with([
            'success' => 'Monitoring data successfully added'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Involtage $involtage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Involtage $involtage)
    {
        return view(
            'involtage.edit', 
            [
                'involtage' => $involtage
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Involtage $involtage)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'voltage' => ['required', 'numeric', 'min:0'],
            'information' => ['required', 'string', 'max:500'],
        ]);

        $involtage->update([
            'name' => $request->name,
            'location' => $request->location,
            'voltage' => $request->voltage,
            'information' => $request->information,
        ]);

        return redirect()->route('involtage.index')->with([
            'success' => 'Monitoring data successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Involtage $involtage)
    {
        $involtage->delete();

        return redirect()->route('involtage.index')->with([
            'success' => 'Monitoring data successfully deleted'
        ]);
    }
}
