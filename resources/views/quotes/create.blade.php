@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form quote-form" action="/quotes">
            @csrf
            <div class="form-header">
                <h1>Create Quote</h1>
            </div>
            <div class="form-block">
                <x-form.field class="fb-1000">
                    <x-form.label for="customer">Choose a Customer</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="customer" type="text" name="customer"
                        value="{{ old('customer') }}" />
                    <x-form.error name="customer" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="product">Choose a Product</x-form.label>
                    <x-form.input placeholder="Enter Product Name" id="product" type="text" name="product"
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
                <x-button btntype="secondary" type="submit">Save</x-button>
            </div>
        </form>
    </div>
@endSection
