<?php
// app/Http/Controllers/PartyController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // The select() is not necessary here, Eloquent handles it.
        $parties = Party::orderBy('id', 'desc')->get();
        return view('party.index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addParty()
    {
        return view('party.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createParty(Request $request)
    {
        // Use validated data to prevent mass assignment vulnerabilities.
        $validatedData = $request->validate([
            'party_type' => 'required|in:client,vendor,employee',
            'full_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'ifsc_code' => 'required|string|max:50',
            'branch_address' => 'required|string|max:255',
        ]);

        Party::create($validatedData);

        return redirect()->route('manage-parties')->withStatus("Party created successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editParty($party_id)
    {
        $data['party'] = Party::findOrFail($party_id);
        return view("party.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateParty($id, Request $request)
    {
        $validatedData = $request->validate([
            'party_type' => 'required|in:client,vendor,employee',
            'full_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'ifsc_code' => 'required|string|max:50',
            'branch_address' => 'required|string|max:255',
        ]);

        $party = Party::findOrFail($id);
        $party->update($validatedData);

        return redirect()->route('manage-parties')->withStatus("Party updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteParty(Party $party)
    {
        $party->delete(); // This will perform a soft delete if the trait is used.

        return redirect()->route('manage-parties')->withStatus("Party deleted successfully");
    }
}
