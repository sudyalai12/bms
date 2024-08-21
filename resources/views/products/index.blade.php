@extends('layouts.app')
@section('content')
    <h1 class="heading">Products</h1>
    <x-button><a href="/products/create">Add new Product</a></x-button>
    <x-table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Supplier</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><a href="/products/{{ $product->id }}">{{ $product->id }}</a></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
