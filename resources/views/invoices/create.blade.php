@extends('layouts.vertical', ['title' => 'Invoices', 'sub_title' => 'Invoice', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Create Invoice</h2>
                <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Back</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Transaction:</strong>
                        <select name="transaction_id" class="form-control">
                            @foreach ($transactions as $transaction)
                                <option value="{{ $transaction->id }}">{{ $transaction->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
