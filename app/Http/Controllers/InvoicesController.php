<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('transaction')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $transactions = Transaction::all();
        return view('invoices.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
        ]);

        $build = DB::table('transactions')->where('id', '=', $request->transaction_id)->first();
        // dd($build);

        $invoice = Invoice::create([
            'transaction_id' => $validatedData['transaction_id'],
            'amount' => $build->total_amount,
            'status' => 'unpaid'
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    // InvoiceController.php

    public function show(Invoice $invoice)
    {
        $transaction = Transaction::findOrFail($invoice->transaction_id);
        return view('invoices.show', compact('invoice', 'transaction'));
    }



    public function edit(Invoice $invoice)
    {
        $transactions = Transaction::all();
        return view('invoices.edit', compact('invoice', 'transactions'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'status' => 'required|string',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
