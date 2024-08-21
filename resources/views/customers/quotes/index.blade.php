@extends('layouts.app')
@php
    $index = 1;
@endphp
@section('content')
    <h1 class="heading">Quotes</h1>
    <form method="POST" action="/customers/{{ $customer->id }}/quotes">
        @csrf
        <x-button type="submit">add new quote</x-button>
    </form>
    <x-table>
        <thead>
            <tr>
                <th>SNo</th>
                <th>Reference</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->quotes->sortByDesc('updated_at') as $quote)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td><a href="/quotes/{{ $quote->id }}">{{ $quote->reference }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
