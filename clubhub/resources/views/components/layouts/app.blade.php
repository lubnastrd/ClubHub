<x-layouts.app.sidebar :title="$title ?? null">
    {{ $slot ?? '' }}
    @yield('content')
</x-layouts.app.sidebar>
