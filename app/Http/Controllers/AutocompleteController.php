<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function fetch(Request $request)
    {
        $column = $request->get('column');
        $search = $request->get('search');

        $data = match ($column) {
            'company' => Company::whereLike('name', "%$search%")->pluck('name'),
            'customer' => Customer::whereLike('name', "%$search%")->pluck('name'),
            'department' => Department::whereLike('name', "%$search%")->pluck('name'),
            default => []
        };
        return response()->json($data);
    }
}
