@extends('layouts.app')
@section('content')
    <h1 class="heading">Customers</h1>
    <x-button><a href="/customers/create">Add new Customer</a></x-button>
    <x-table>
        <thead>
            <tr>
                <th>CustID</th>
                <th>ContactName</th>
                <th>CustomerName</th>
                <th>Dept/Desig</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>City</th>
                <th>Pincode</th>
                <th>State</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>TaxType</th>
                <th>GSTN</th>
                <th>PAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->id }}</a></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->company->name }}</td>
                    <td>{{ $customer->department->name }}</td>
                    <td>{{ $customer->address->address1 }}</td>
                    <td>{{ $customer->address->address2 }}</td>
                    <td>{{ $customer->address->city }}</td>
                    <td>{{ $customer->address->pincode }}</td>
                    <td>{{ $customer->address->state }}</td>
                    <td>{{ $customer->address->country->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->mobile }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->tax_type }}</td>
                    <td>{{ $customer->gstn }}</td>
                    <td>{{ $customer->pan }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
@endSection
