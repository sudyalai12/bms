@extends('layouts.app')
@section('content')
    <h1 class="heading">Customer Details</h1>
    <table class="table mb-1">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th>Company Name</th>
                <td>{{ $customer->company->name }}</td>
            </tr>
            <tr>
                <th>Department Name</th>
                <td>{{ $customer->department->name }}</td>
            </tr>
            <tr>
                <th>Address1</th>
                <td>{{ $customer->address->address1 }}</td>
            </tr>
            <tr>
                <th>Address2</th>
                <td>{{ $customer->address->address2 }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $customer->address->city }}</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>{{ $customer->address->pincode }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $customer->address->state }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $customer->address->country }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $customer->phone }}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{ $customer->mobile }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <th>Tax Type</th>
                <td>{{ $customer->tax_type }}</td>
            </tr>
            <tr>
                <th>GST Number</th>
                <td>{{ $customer->gstn }}</td>
            </tr>
            <tr>
                <th>PAN</th>
                <td>{{ $customer->pan }}</td>
            </tr>
        </tbody>
    </table>
    <x-button><a href="/customers/{{ $customer->id }}/edit">Edit</a></x-button>
@endSection
