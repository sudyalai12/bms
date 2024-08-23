@extends('layouts.app')
@php
    $index = 1;
    // function currencyConveter($price)
    // {
    //     $currencies = [
    //         'USD' => ['formatter' => 'en_US'], // US Dollar
    //         'EUR' => ['formatter' => 'fr-FR'], // Euro
    //         'GBP' => ['formatter' => 'en_GB'], // Pound Sterling
    //         'INR' => ['formatter' => 'en_IN'], // Indian Rupee
    //     ];

    //     // Determine the currency to use based on the selected currency cookie. If no currency is selected, default to INR (Indian Rupee).
    //     $currency = $currencies['INR'];

    //     // Create a formatter object for the selected currency.
    //     $formatter = new NumberFormatter($currency['formatter'], \NumberFormatter::CURRENCY);

    //     // Format and return the currency value.
    //     // with one space between the currency sign and currency value
    //     return $formatter->formatCurrency($price);
    // }
@endphp
@section('content')
    <div class="form-box">
        <form method="POST" class="form quote-form" action="/quotes/{{ $quote->id }}">
            @csrf
            <div class="form-header">
                <h1>Add Item</h1>
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
                {{-- <th>Description</th> --}}
                <th>Quantity</th>
                <th>Unit Price (INR)</th>
                <th>Total (INR)</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quote->items as $item)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $item->product->name }}</td>
                    {{-- <td>{{ $item->product->description }}</td> --}}
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->product->price, 2) }}</td>
                    <td>{{ number_format($item->total(), 2) }}</td>
                    <td>
                        <x-button btntype="danger" type="submit" form="delete-form-{{ $item->id }}">Remove</x-button>
                        <form id="delete-form-{{ $item->id }}"
                            action="/quotes/{{ $quote->id }}/items/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr class="no-border">
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total (INR) : </strong></td>
                <td>{{ number_format($quote->total(), 2) }}</td>
                <td></td>
            </tr>
            <tr class="no-border">
                <td></td>
                <td></td>
                <td></td>
                <td><strong>GST (18%) : </strong></td>
                <td>{{ number_format($quote->totalWithTax(), 2) }}</td>
                <td></td>
            </tr>
            <tr class="no-border">
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Grand Total (INR) : </strong></td>
                <td><strong>{{ number_format($quote->grandTotal(), 2) }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </x-table>

    <x-button btntype="warning"><a href="/quotes/{{ $quote->id }}/pdf" target="_blank">Generate Quote PDF</a></x-button>
@endSection

@section('js')
    <script>
        let products = {!! json_encode($products->toArray()) !!};
    </script>
@endsection
