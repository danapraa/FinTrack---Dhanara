<x-layouts.base :title="$title ?? null">
    <div class="min-h-dvh" x-data="theme">
        <x-flash />
        <x-nav.sidebar />

        <div class="lg:pl-64">
            <main class="mx-auto w-full max-w-5xl px-5 pb-28 pt-8 lg:px-10 lg:pb-12 lg:pt-12">
                {{ $slot }}
            </main>
        </div>

        <x-nav.bottom />
    </div>
</x-layouts.base>
