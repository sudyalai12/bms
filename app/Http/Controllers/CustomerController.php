<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CustomerController extends Controller
{


    public function index(): \Illuminate\View\View
    {
        $customers = Customer::with('company', 'department', 'address')->latest()->get();
        return view('customers.index', compact('customers'));
    }

    public function create(): \Illuminate\View\View
    {
        $taxTypes = Customer::$taxTypes;
        $countries = Customer::$countryList;
        return view('customers.create', compact('taxTypes', 'countries'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|min:3|max:255|string',
            'company' => 'required|min:3|max:255|string',
            'department' => 'required|min:2|max:255|string',
            'address1' => 'required|min:3|max:255|string',
            'address2' => 'required|min:3|max:255|string',
            'city' => 'required|min:3|max:255|string',
            'pincode' => 'required|numeric|digits:6',
            'state' => 'required|min:3|max:255|string',
            'country' => [
                'required',
                'in:' . implode(',', Customer::$countryList),
            ],
            'phone' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:10',
            'tax_type' => [
                'required',
                'in:' . implode(',', Customer::$taxTypes),
            ],
            'gstn' => 'required|string|size:15',
            'pan' => 'required|string|size:10',
        ]);

        $customer = Customer::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'mobile' => $validate['mobile'],
            'tax_type' => $validate['tax_type'],
            'gstn' => $validate['gstn'],
            'pan' => $validate['pan'],
            'company_id' => Company::firstOrCreate(['name' => $validate['company']])->id,
            'department_id' => Department::firstOrCreate(['name' => $validate['department']])->id,
            'address_id' => Address::create([
                'address1' => $validate['address1'],
                'address2' => $validate['address2'],
                'city' => $validate['city'],
                'pincode' => $validate['pincode'],
                'state' => $validate['state'],
                'country' => $validate['country'],
            ])->id,
        ]);

        return redirect('/customers');
    }

    public function show(Customer $customer): \Illuminate\View\View
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer): \Illuminate\View\View
    {
        $taxTypes = Customer::$taxTypes;
        $countries = Customer::$countryList;
        return view('customers.edit', compact('customer', 'taxTypes', 'countries'));
    }

    public function update(Customer $customer, Request $request): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|min:3|max:255|string',
            'company' => 'required|min:3|max:255|string',
            'department' => 'required|min:2|max:255|string',
            'address1' => 'required|min:3|max:255|string',
            'address2' => 'required|min:3|max:255|string',
            'city' => 'required|min:3|max:255|string',
            'pincode' => 'required|numeric|digits:6',
            'state' => 'required|min:3|max:255|string',
            'country' => [
                'required',
                'in:' . implode(',', Customer::$countryList),
            ],
            'phone' => 'required|numeric|digits:10',
            'mobile' => 'required|numeric|digits:10',
            'tax_type' => [
                'required',
                'in:' . implode(',', Customer::$taxTypes),
            ],
            'gstn' => 'required|string|size:15',
            'pan' => 'required|string|size:10',
        ]);

        $company = Company::firstOrCreate(['name' => $validate['company']]);
        $department = Department::firstOrCreate(['name' => $validate['department']]);
        $address = Address::firstOrCreate(
            [
                'address1' => $validate['address1'],
                'address2' => $validate['address2'],
                'city' => $validate['city'],
                'pincode' => $validate['pincode'],
                'state' => $validate['state'],
                'country' => $validate['country'],
            ],
            [
                'address1' => $validate['address1'],
                'address2' => $validate['address2'],
                'city' => $validate['city'],
                'pincode' => $validate['pincode'],
                'state' => $validate['state'],
                'country' => $validate['country'],
            ]
        );

        $customer->update([
            'company_id' => $company->id,
            'department_id' => $department->id,
            'address_id' => $address->id,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'mobile' => $validate['mobile'],
            'tax_type' => $validate['tax_type'],
            'gstn' => $validate['gstn'],
            'pan' => $validate['pan'],
        ]);

        return redirect('/customers/' . $customer->id);
    }

    public function destroy(Customer $customer): \Illuminate\Http\RedirectResponse
    {
        $customer->delete();
        return redirect('/customers');
    }
}
