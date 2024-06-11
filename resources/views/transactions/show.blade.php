@extends('layouts.vertical', ['title' => 'Show Transaction', 'sub_title' => 'Building', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container">
        <h1>Show Transaction</h1>
        <form class="grid lg:grid-cols-3 gap-6">
            <div>
                <label for="building_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Building</label>
                <select name="building_id" id="building_id" class="form-select" disabled>
                    @foreach ($buildings as $building)
                        <option value="{{ $building->id }}" data-price="{{ $building->rent_price }}"
                            {{ $transaction->building_id == $building->id ? 'selected' : '' }}>{{ $building->description }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="renter_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Renter</label>
                <select name="renter_id" id="renter_id" class="form-select" disabled>
                    @foreach ($renters as $renter)
                        <option value="{{ $renter->id }}" {{ $transaction->renter_id == $renter->id ? 'selected' : '' }}>
                            {{ $renter->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="start_date" class="text-gray-800 text-sm font-medium inline-block mb-2">Start Date</label>
                <input type="datetime-local" name="start_date" id="start_date" class="form-input"
                    value="{{ (new DateTime($transaction->start_date))->format('Y-m-d\TH:i') }}" disabled>
            </div>
            <div>
                <label for="end_date" class="text-gray-800 text-sm font-medium inline-block mb-2">End Date</label>
                <input type="datetime-local" name="end_date" id="end_date" class="form-input"
                    value="{{ (new DateTime($transaction->end_date))->format('Y-m-d\TH:i') }}" disabled>
            </div>
            <div>
                <label for="total_amount" class="text-gray-800 text-sm font-medium inline-block mb-2">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount" class="form-input"
                    value="{{ $transaction->total_amount }}" step="0.01" disabled>
            </div>
            <div class="col-span-3">
                <a href="{{ route('transactions.index') }}" class="btn bg-primary text-white">Back to Transactions</a>
            </div>
        </form>
    </div>
@endsection
