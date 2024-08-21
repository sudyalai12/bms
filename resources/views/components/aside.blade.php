<aside>
        <x-nav-link href="/" :active="request()->is('/')" img="/assets/img/dashboard.png">Dashboard</x-nav-link>
        <x-nav-link href="/customers" :active="request()->is('customers')" img="/assets/img/customer.png">Customers</x-nav-link>
        <x-nav-link href="/products" :active="request()->is('products')" img="/assets/img/product.png">Products</x-nav-link>
        <x-nav-link href="/quotes" :active="request()->is('quotes')" img="/assets/img/quote.png">Quotes</x-nav-link>
</aside>
