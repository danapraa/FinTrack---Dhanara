@props(['title', 'subtitle' => null])

<header class="mb-6 flex items-end justify-between gap-4 lg:mb-8">
    <div class="min-w-0">
        <h1 class="font-display text-3xl tracking-tight lg:text-4xl">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-1 text-muted">{{ $subtitle }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="flex shrink-0 gap-2">{{ $actions }}</div>
    @endisset
</header>
