<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\User;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');
        $transactions = Transaction::with('building', 'renter')->get();
        return view('transactions.index', compact('transactions'), ['mode' => $mode, 'demo' => $demo]);
    }


    public function create()
    {
        $buildings = Building::all();
        $renters = User::all();

        return view('transactions.create', compact('buildings', 'renters'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'renter_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_amount' => 'required|numeric',
        ]);

        $transaction = Transaction::create($validatedData);

        return redirect()->route('transactions.show', $transaction->id)->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $buildings = Building::all();
        $renters = User::all();
        return view('transactions.show', compact('transaction', 'buildings', 'renters'));
    }

    public function edit(Transaction $transaction)
    {
        $buildings = Building::all();
        $renters = User::all();
        return view('transactions.edit', compact('transaction', 'buildings', 'renters'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'renter_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_amount' => 'required|numeric',
        ]);

        $transaction->update($validatedData);

        return redirect()->route('transactions.show', $transaction->id)->with('success', 'Transaction updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
