@extends('layouts.vertical', ['title' => 'Invoices', 'sub_title' => 'Invoice', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Invoices</h2>
                <a href="{{ route('invoices.create') }}" class="btn btn-success">Create Invoice</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Transaction ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($invoices as $key => $invoice)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $invoice->transaction->id }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('invoices.show', $invoice->id) }}">Show</a>
                            {{-- <a class="btn btn-primary" href="{{ route('invoices.edit', $invoice->id) }}">Edit</a> --}}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
