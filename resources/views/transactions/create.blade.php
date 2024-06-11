@extends('layouts.vertical', ['title' => 'Index', 'sub_title' => 'Building', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>
        <form class="grid lg:grid-cols-3 gap-6" action="{{ route('transactions.store') }}" method="POST" id="transaction-form">
            @csrf
            <div>
                <label for="building_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Building</label>
                <select name="building_id" id="building_id" class="form-select @error('building_id') is-invalid @enderror"
                    required>
                    <option value="" selected disabled>Choose...</option>
                    @foreach ($buildings as $building)
                        <option value="{{ $building->id }}" data-price="{{ $building->rent_price }}"
                            {{ old('building_id') == $building->id ? 'selected' : '' }}>{{ $building->description }}
                        </option>
                    @endforeach
                </select>
                @error('building_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="renter_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Renter</label>
                <select name="renter_id" id="renter_id" class="form-select @error('renter_id') is-invalid @enderror"
                    required>
                    <option value="" selected disabled>Choose...</option>
                    @foreach ($renters as $renter)
                        <option value="{{ $renter->id }}" {{ old('renter_id') == $renter->id ? 'selected' : '' }}>
                            {{ $renter->name }}</option>
                    @endforeach
                </select>
                @error('renter_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="start_date" class="text-gray-800 text-sm font-medium inline-block mb-2">Start Date</label>
                <input type="datetime-local" name="start_date" id="start_date"
                    class="form-input @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="end_date" class="text-gray-800 text-sm font-medium inline-block mb-2">End Date</label>
                <input type="datetime-local" name="end_date" id="end_date"
                    class="form-input @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="total_amount" class="text-gray-800 text-sm font-medium inline-block mb-2">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount"
                    class="form-input @error('total_amount') is-invalid @enderror" value="{{ old('total_amount') }}"
                    step="0.01" required readonly>
                @error('total_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-span-3">
                <button class="btn bg-primary text-white" type="submit">Create Transaction</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buildingSelect = document.getElementById('building_id');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const totalAmountInput = document.getElementById('total_amount');

            // Function to calculate total amount
            function calculateTotalAmount() {
                const buildingPrice = parseFloat(buildingSelect.options[buildingSelect.selectedIndex].dataset.price);
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                const timeDifference = endDate - startDate; // Difference in milliseconds
                const daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24)); // Convert milliseconds to days and round up

                // Calculate total amount
                const totalAmount = buildingPrice * daysDifference;

                // Update total amount input value
                totalAmountInput.value = totalAmount.toFixed(2);
            }

            // Add event listeners to start date and end date inputs
            startDateInput.addEventListener('change', calculateTotalAmount);
            endDateInput.addEventListener('change', calculateTotalAmount);
            buildingSelect.addEventListener('change', calculateTotalAmount);

            // Initial calculation
            calculateTotalAmount();
        });
    </script>
@endsection
