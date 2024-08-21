<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Quote;
use App\Models\QuoteItem;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $quotes = Quote::with('customer')->latest()->get();
        return view('quotes.index', compact('quotes'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $customers = Customer::pluck('name');
        $products = Product::pluck('name');

        return view('quotes.create', compact('customers', 'products'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate([
            'customer' => 'required|exists:customers,name',
            'product' => 'required|exists:products,name',
            'quantity' => 'required|numeric|min:1|max:100',
        ]);

        $customerId = Customer::where('name', $validate['customer'])->first()->id;
        $productId = Product::where('name', $validate['product'])->first()->id;
        $quote = Quote::create([
            'customer_id' => $customerId,
        ]);
        $quote->reference = $quote->customer->generateReference();
        $quote->save();
        $quote->items()->create(['product_id' => $productId, 'quantity' => $request->quantity]);
        return redirect("/quotes/{$quote->id}");
    }

    public function show(Quote $quote): \Illuminate\Contracts\View\View
    {
        $products = Product::pluck('name');
        return view('quotes.show', compact('quote', 'products'));
    }

    public function edit() {}

    public function update() {}

    public function destroy() {}

    public function storeItem(Request $request, Quote $quote): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate([
            'product' => ['required', 'exists:products,name'],
            'quantity' => ['required', 'numeric', 'min:1', 'max:100'],
        ]);

        $productId = Product::where('name', $validate['product'])->first()->id;
        $quoteItem = $quote->items()->updateOrCreate(
            ['product_id' => $productId],
            ['quantity' => $quote->items()->where('product_id', $productId)->value('quantity') + $request->quantity]
        );
        return redirect("/quotes/{$quote->id}");
    }

    public function destroyItem(Quote $quote, QuoteItem $quoteItem): \Illuminate\Http\RedirectResponse
    {
        $quoteItem->delete();
        return redirect("/quotes/{$quote->id}");
    }
}
