@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/products">
            @csrf
            <div class="form-header">
                <h1>Product Details</h1>
                <p>Enter the details of the Product</p>
            </div>
            <div class="form-block">
                <x-form.field class="fb-200">
                    <x-form.label for="product">Product Name</x-form.label>
                    <x-form.input placeholder="Enter Product Name" id="product" type="text" name="product"
                        value="{{ old('product') }}" />
                    <x-form.error name="product" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier">Supplier Name</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ old('supplier') }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="price">Price</x-form.label>
                    <x-form.input placeholder="Enter Price" id="price" type="number" name="price"
                        value="{{ old('price') }}" />
                    <x-form.error name="price" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="description">Description</x-form.label>
                    <x-form.input placeholder="Enter Product Description" id="description" type="text" name="description"
                        value="{{ old('description') }}" />
                    <x-form.error name="description" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
            </div>
        </form>
    </div>
@endSection
