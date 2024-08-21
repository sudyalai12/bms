@extends('layouts.app')
@section('content')
    <h1 class="heading">Quotes</h1>
    <x-button><a href="/quotes/create">Add new Quote</a></x-button>
    <x-table>
        <thead>
            <tr>
                <th>QuoteID</th>
                <th>Reference</th>
                <th>Customer Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->id }}</a></td>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->reference }}</a></td>
                    <td><a href="/customers/{{ $quote->customer->id }}">{{ $quote->customer->name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
