@props(['btntype' => 'primary'])

<button {{ $attributes->merge(['class' => 'btn btn-' . $btntype . ' cursor']) }}>{{ $slot }}</button>
