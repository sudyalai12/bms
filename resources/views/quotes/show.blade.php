@extends('layouts.app')
@php
    $index = 1;
@endphp
@section('content')
    <div class="form-box">
        <form method="POST" class="form quote-form" action="/quotes/{{ $quote->id }}">
            @csrf
            <div class="form-header">
                <h1>Create Quote</h1>
            </div>
            <div class="form-block">
                <x-form.field class="fb-1000">
                    <x-form.label for="customer_name">Choose a Customer</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="customer_name" type="text" name="customer"
                        value="{{ $quote->customer->name }}" disabled />
                    <x-form.error name="customer" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="product">Choose a Product</x-form.label>
                    <x-form.input placeholder="Enter Product" id="product" type="text" name="product"
                        value="{{ old('product') }}" />
                    <x-form.error name="product" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="quantity">Quantity</x-form.label>
                    <x-form.input placeholder="Enter Quantity" id="quantity" type="number" name="quantity" value="1"
                        min="1" />
                    <x-form.error name="quantity" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button btntype="secondary" type="submit">Add</x-button>
            </div>
        </form>
    </div>

    <x-table class="quote-table">
        <thead>
            <tr>
                <th>SNo</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quote->items as $item)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->total() }}</td>
                    <td>
                        <form action="/quotes/{{ $quote->id }}/items/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button btntype="danger" type="submit">Remove</x-button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total : </strong></td>
                <td>{{ $quote->total() }}</td>
                <td></td>
            </tr>
        </tbody>
    </x-table>
@endSection

@section('js')
    <script>
        let products = {!! json_encode($products->toArray()) !!};
    </script>
@endsection
