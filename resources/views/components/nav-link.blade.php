@props(['active' => false, 'img' => ''])

<a {{ $attributes->class(['sidenav-link', 'active' => $active]) }}>
    <img src="{{ url($img) }}" alt="">
    {{ $slot }}
</a>
