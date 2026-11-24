@php
    $left = [
        ['Beranda', 'dashboard', 'home', 'dashboard'],
        ['Transaksi', 'transactions.index', 'swap', 'transactions.*'],
    ];
    $right = [
        ['Anggaran', 'budgets.index', 'pie', 'budgets.*'],
    ];
@endphp

<div x-data="{ more: false }" x-effect="document.body.classList.toggle('overflow-hidden', more)" class="lg:hidden">

    <nav class="fixed inset-x-0 bottom-0 z-40 border-t border-line bg-surface/90 pb-[env(safe-area-inset-bottom)] backdrop-blur"
         aria-label="Navigasi bawah">
        <ul class="mx-auto grid h-16 max-w-md grid-cols-5 items-center">

            @foreach ($left as [$label, $route, $icon, $match])
                @php $active = request()->routeIs($match); @endphp
                <li>
                    <a href="{{ route($route) }}" @if ($active) aria-current="page" @endif
                       class="flex flex-col items-center gap-1 py-2 text-[11px] font-medium {{ $active ? 'text-accent' : 'text-muted' }}">
                        <x-icon :name="$icon" />
                        {{ $label }}
                    </a>
                </li>
            @endforeach

            <li class="flex justify-center">
                <a href="{{ route('transactions.create') }}" aria-label="Tambah transaksi"
                   class="-mt-7 grid size-14 place-items-center rounded-full bg-accent text-accent-ink shadow-soft ring-4 ring-canvas transition active:scale-95">
                    <x-icon name="plus" size="size-6" />
                </a>
            </li>

            @foreach ($right as [$label, $route, $icon, $match])
                @php $active = request()->routeIs($match); @endphp
                <li>
                    <a href="{{ route($route) }}" @if ($active) aria-current="page" @endif
                       class="flex flex-col items-center gap-1 py-2 text-[11px] font-medium {{ $active ? 'text-accent' : 'text-muted' }}">
                        <x-icon :name="$icon" />
                        {{ $label }}
                    </a>
                </li>
            @endforeach

            <li>
                <button type="button" @click="more = true"
                        class="flex w-full flex-col items-center gap-1 py-2 text-[11px] font-medium text-muted">
                    <x-icon name="dots" />
                    Lainnya
                </button>
            </li>
        </ul>
    </nav>

    {{-- Bottom sheet "Lainnya" --}}
    <div x-show="more" x-cloak class="fixed inset-0 z-50" @keydown.escape.window="more = false">
        <div x-show="more" x-transition.opacity.duration.200ms @click="more = false"
             class="absolute inset-0 bg-ink/40"></div>

        <div x-show="more"
             x-transition:enter="transition duration-200 ease-out" x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
             x-transition:leave="transition duration-150 ease-in" x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full"
             class="absolute inset-x-0 bottom-0 max-h-[85dvh] overflow-y-auto rounded-t-3xl bg-surface p-5 pb-[calc(1.25rem+env(safe-area-inset-bottom))] shadow-soft"
             role="dialog" aria-modal="true" aria-label="Menu lainnya">

            <div class="mx-auto mb-5 h-1.5 w-10 rounded-full bg-line"></div>

            <div class="grid grid-cols-3 gap-3">
                @foreach (config('navigation.groups') as $items)
                    @foreach ($items as $item)
                        @php $active = request()->routeIs($item['match']); @endphp
                        <a href="{{ route($item['route']) }}"
                           class="flex flex-col items-center gap-2 rounded-2xl bg-surface-2 px-2 py-4 text-center text-xs font-medium {{ $active ? 'text-accent ring-2 ring-accent/40' : '' }}">
                            <x-icon :name="$item['icon']" size="size-6" />
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                @endforeach

                <a href="{{ route('profile.edit') }}"
                   class="flex flex-col items-center gap-2 rounded-2xl bg-surface-2 px-2 py-4 text-center text-xs font-medium {{ request()->routeIs('profile.*') ? 'text-accent ring-2 ring-accent/40' : '' }}">
                    <x-icon name="user" size="size-6" />
                    Profil
                </a>
            </div>

            <div class="mt-5 flex gap-2 border-t border-line pt-4">
                <button type="button" class="btn-ghost flex-1" @click="set(mode === 'dark' ? 'light' : 'dark')">
                    <x-icon name="moon" x-show="mode !== 'dark'" />
                    <x-icon name="sun" x-show="mode === 'dark'" x-cloak />
                    <span x-text="mode === 'dark' ? 'Mode terang' : 'Mode gelap'"></span>
                </button>

                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button class="btn-ghost w-full"><x-icon name="logout" /> Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
