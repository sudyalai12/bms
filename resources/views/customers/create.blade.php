@extends('layouts.app')
@section('content')
    <div class="form-box">
        <form method="POST" class="form customer-form" action="/customers">
            @csrf
            <div class="form-header">
                <h1>Customer Details</h1>
                <p>Enter the details of the customer</p>
            </div>
            <div class="form-block">
                <h2>Basic Details</h2>
                <x-form.field class="fb-500">
                    <x-form.label for="name">Customer Name</x-form.label>
                    <x-form.input placeholder="Enter Customer Name" id="name" type="text" name="name"
                        value="{{ old('name') }}" />
                    <x-form.error name="name" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="email">Email</x-form.label>
                    <x-form.input placeholder="Enter Email" id="email" type="email" name="email"
                        value="{{ old('email') }}" />
                    <x-form.error name="email" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="company">Company</x-form.label>
                    <x-form.input placeholder="Enter Company Name" id="company" type="text" name="company"
                        value="{{ old('company') }}" />
                    <x-form.error name="company" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="department">Department</x-form.label>
                    <x-form.input placeholder="Enter Department" id="department" type="text" name="department"
                        value="{{ old('department') }}" />
                    <x-form.error name="department" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Address Details</h2>
                <x-form.field class="fb-500">
                    <x-form.label for="address1">Address1</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address1" type="text" name="address1"
                        value="{{ old('address1') }}" />
                    <x-form.error name="address1" />
                </x-form.field>
                <x-form.field class="fb-500">
                    <x-form.label for="address2">Address2</x-form.label>
                    <x-form.input placeholder="Enter Address" id="address2" type="text" name="address2"
                        value="{{ old('address2') }}" />
                    <x-form.error name="address2" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="city">City</x-form.label>
                    <x-form.input placeholder="Enter City" id="city" type="text" name="city"
                        value="{{ old('city') }}" />
                    <x-form.error name="city" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="pincode">Pin Code</x-form.label>
                    <x-form.input placeholder="Enter Pin Code" id="pincode" type="number" name="pincode"
                        value="{{ old('pincode') }}" />
                    <x-form.error name="pincode" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="state">State</x-form.label>
                    <x-form.input placeholder="Enter State" id="state" type="text" name="state"
                        value="{{ old('state') }}" />
                    <x-form.error name="state" />
                </x-form.field>
                <x-form.field class="fb-200">
                    <x-form.label for="country">Country</x-form.label>
                    <x-form.input placeholder="Enter Country" id="country" type="text" name="country"
                        value="{{ old('country') == '' ? 'India' : old('country') }}" />
                    <x-form.error name="country" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Contact Details</h2>
                <x-form.field>
                    <x-form.label for="phone">Phone Number</x-form.label>
                    <x-form.input placeholder="Enter Phone Number" id="phone" type="number" name="phone"
                        min="0" value="{{ old('phone') }}" />
                    <x-form.error name="phone" />
                </x-form.field>
                <x-form.field>
                    <x-form.label for="mobile">Mobile Number</x-form.label>
                    <x-form.input placeholder="Enter Mobile Number" id="mobile" type="number" name="mobile"
                        min="0" value="{{ old('mobile') }}" />
                    <x-form.error name="mobile" />
                </x-form.field>
            </div>

            <div class="form-block">
                <h2>Tax Details</h2>
                <x-form.field>
                    <x-form.label for="tax_type">Tax Type</x-form.label>
                    <select class="form-input" name="tax_type" id="tax_type">
                        <option value="">Select Tax Type</option>
                        @foreach ($taxTypes as $taxType)
                            <option value="{{ $taxType }}" {{ old('tax_type') == $taxType ? 'selected' : '' }}>
                                {{ $taxType }}
                            </option>
                        @endforeach
                    </select>
                    <x-form.error name="tax_type" />
                </x-form.field>
                <x-form.field>
                    <x-form.label for="gstn">GST Number</x-form.label>
                    <x-form.input placeholder="Enter GST Number" id="gstn" type="text" name="gstn"
                        value="{{ old('gstn') }}" />
                    <x-form.error name="gstn" />
                </x-form.field>
                <x-form.field>
                    <x-form.label for="pan">PAN Number</x-form.label>
                    <x-form.input placeholder="Enter PAN Number" id="pan" type="text" name="pan"
                        value="{{ old('pan') }}" />
                    <x-form.error name="pan" />
                </x-form.field>
            </div>

            <div class="text-center">
                <x-button type="submit">Save</x-button>
            </div>
        </form>
    </div>
@endSection

@section('js')
    <script>
        let companies = {!! json_encode($companies->toArray()) !!};
        let departments = {!! json_encode($departments->toArray()) !!};
        let countries = {!! json_encode($countries) !!};
    </script>
@endsection
