@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/products/{{ $product->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Product Details</h1>
                <p>Edit the details of the Product</p>
            </div>
            <div class="form-block">
                <x-form.field class="fb-200">
                    <x-form.label for="product">Product Name</x-form.label>
                    <x-form.input placeholder="Enter Product Name" id="product" type="text" name="product"
                        value="{{ $product->name }}" />
                    <x-form.error name="product" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="supplier">Supplier Name</x-form.label>
                    <x-form.input placeholder="Enter Supplier Name" id="supplier" type="text" name="supplier"
                        value="{{ $product->supplier->name }}" />
                    <x-form.error name="supplier" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="price">Price</x-form.label>
                    <x-form.input placeholder="Enter Price" id="price" type="number" name="price"
                        value="{{ $product->price }}" />
                    <x-form.error name="price" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="description">Description</x-form.label>
                    <x-form.input placeholder="Enter Product Description" id="description" type="text" name="description"
                        value="{{ $product->description }}" />
                    <x-form.error name="description" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
                <x-button btntype="danger" form="delete-form">Delete</x-button>
            </div>
        </form>

        <form id="delete-form" method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endSection
