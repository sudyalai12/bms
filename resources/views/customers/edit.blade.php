@extends('layouts.app')
@section('js')
@endsection
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/customers/{{ $customer->id }}">
            @csrf
            @method('PATCH')
            <div class="form-header">
                <h1>Edit Customer Details</h1>
                <p>Edit the details of the customer</p>
            </div>
            <div class="form-block">
                <h2>Basic Details</h2>
                <x-form.field class="fb-500">
                    <x-form.label for="name">Customer Name</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="name" type="text" name="name"
                        value="{{ $customer->name }}" />
                    <x-form.error name="name" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input placeholder="Enter Email" id="email" type="email" name="email"
                        value="{{ $customer->email }}" />
                    <x-form.error name="email" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="company">Company</x-form.label>
                    <x-form.input placeholder="Enter Company Name" id="company" type="text" name="company"
                        value="{{ $customer->company->name }}" />
                    <x-form.error name="company" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="department">Department</x-form.label>
                    <x-form.input placeholder="Enter Department" id="department" type="text" name="department"
                        value="{{ $customer->department->name }}" />
                    <x-form.error name="department" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Address Details</h2>
                <x-form.field class="fb-500">
                    <x-form.label for="address1">Address1</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address1" type="text" name="address1"
                        value="{{ $customer->address->address1 }}" />
                    <x-form.error name="address1" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="address2">Address2</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address2" type="text" name="address2"
                        value="{{ $customer->address->address2 }}" />
                    <x-form.error name="address2" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="city">City</x-form.label>
                    <x-form.input placeholder="Enter City" id="city" type="text" name="city"
                        value="{{ $customer->address->city }}" />
                    <x-form.error name="city" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="pincode">Pin Code</x-form.label>
                    <x-form.input placeholder="Enter Pin Code" id="pincode" type="number" name="pincode"
                        value="{{ $customer->address->pincode }}" />
                    <x-form.error name="pincode" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="state">State</x-form.label>
                    <x-form.input placeholder="Enter State" id="state" type="text" name="state"
                        value="{{ $customer->address->state }}" />
                    <x-form.error name="state" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="country">Country</x-form.label>
                    <x-form.input placeholder="Enter Country" id="country" type="text" name="country"
                        value="{{ $customer->address->country }}" />
                    <x-form.error name="country" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Contact Details</h2>
                <x-form.field>
                    <x-form.label for="phone">Phone Number</x-form.label>
                    <x-form.input placeholder="Enter Phone Number" id="phone" type="number" name="phone"
                        min="0" value="{{ $customer->phone }}" />
                    <x-form.error name="phone" />
                </x-form.field>
                <x-form.field>
                    <x-form.label for="mobile">Mobile Number</x-form.label>
                    <x-form.input placeholder="Enter Mobile Number" id="mobile" type="number" name="mobile"
                        min="0" value="{{ $customer->mobile }}" />
                    <x-form.error name="mobile" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Tax Details</h2>
                <x-form.field>
                    <x-form.label for="tax_type">Tax Type</x-form.label>
                    <select name="tax_type" id="tax_type">
                        <option value="">Select Tax Type</option>
                        @foreach ($taxTypes as $taxType)
                            <option value="{{ $taxType }}" {{ $customer->tax_type == $taxType ? 'selected' : '' }}>
                                {{ $taxType }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="tax_type" />
                </x-form.field>
                <x-form.field>
                    <x-form.label for="gstn">GST Number</x-form.label>
                    <x-form.input placeholder="Enter GST Number" id="gstn" type="text" name="gstn"
                        value="{{ $customer->gstn }}" />
                    <x-form.error name="gstn" />
                </x-form.field>
                <x-form.field>
                    <x-form.label for="pan">PAN Number</x-form.label>
                    <x-form.input placeholder="Enter PAN Number" id="pan" type="text" name="pan"
                        value="{{ $customer->pan }}" />
                    <x-form.error name="pan" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
                <x-button btntype="danger" form="delete-form">Delete</x-button>
            </div>
        </form>
        <form action="/customers/{{ $customer->id }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endSection
