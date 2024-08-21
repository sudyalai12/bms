@extends('layouts.app')
@section('content')
    <h1 class="heading">Product Details</h1>
    <table class="table mb-1">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Supplier</th>
                <td>{{ $product->supplier->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
        </tbody>
    </table>
    <x-button><a href="/products/{{ $product->id }}/edit">Edit</a></x-button>
@endSection
