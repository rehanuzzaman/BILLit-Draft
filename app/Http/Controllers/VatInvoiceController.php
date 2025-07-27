<?php
// app/Http/Controllers/GstBillController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\GstBill;
use Illuminate\Support\Facades\DB;

class GstBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent's SoftDeletes trait handles the is_deleted check automatically.
        $bills = GstBill::with('party')->orderBy('id', 'desc')->get();
        return view("gst-bill.index", compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addGstBill()
    {
        $data['parties'] = Party::where('party_type', 'Client')->orderBy('full_name')->get();
        // Generate a unique invoice number.
        $data['invoice_no'] = 'INV-' . now()->format('Ymd-His');
        return view('gst-bill.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createGstBill(Request $request)
    {
        // Use validated data to prevent mass assignment vulnerabilities.
        $validatedData = $request->validate([
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|max:255|unique:gst_bills',
            'item_description' => 'required|max:250',
            'total_amount' => 'required|numeric',
            'total_amount_usd' => 'nullable|numeric',
            'cgst_rate' => 'nullable|numeric|min:0|max:100',
            'cgst_amount' => 'nullable|numeric|min:0',
            'sgst_rate' => 'nullable|numeric|min:0|max:100',
            'sgst_amount' => 'nullable|numeric|min:0',
            'igst_rate' => 'nullable|numeric|min:0|max:100',
            'igst_amount' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
            'declaration' => 'nullable|string',
        ]);

        $bill = GstBill::create($validatedData);

        // Redirect to the print page after successful creation.
        return redirect()->route('print-gst-bill', ['id' => $bill->id])->withStatus("Bill created successfully");
    }

    /**
     * Display the specified resource for printing.
     */
    public function print($id, $currency = null)
    {
        $data['currency'] = $currency;
        // Use findOrFail to automatically handle cases where the bill doesn't exist.
        $data['bill'] = GstBill::with('party')->findOrFail($id);
        return view("gst-bill.print", $data);
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy($id)
    {
        $bill = GstBill::findOrFail($id);
        $bill->delete(); // This will now perform a soft delete.

        return redirect()->route('manage-gst-bills')->withStatus("Bill deleted successfully");
    }
}