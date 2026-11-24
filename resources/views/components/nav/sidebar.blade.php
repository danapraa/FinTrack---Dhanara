<aside class="fixed inset-y-0 left-0 z-30 hidden w-64 flex-col border-r border-line bg-canvas px-4 py-6 lg:flex">
    <a href="{{ route('dashboard') }}" class="px-3 font-display text-2xl tracking-tight">Dhanara</a>

    <nav class="mt-8 flex-1 space-y-6 overflow-y-auto" aria-label="Navigasi utama">
        @foreach (config('navigation.groups') as $group => $items)
            <div>
                <p class="px-3 text-xs font-semibold uppercase tracking-wider text-muted/80">{{ $group }}</p>
                <ul class="mt-2 space-y-1">
                    @foreach ($items as $item)
                        @php $active = request()->routeIs($item['match']); @endphp
                        <li>
                            <a href="{{ route($item['route']) }}" @if ($active) aria-current="page" @endif
                               class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $active ? 'bg-accent-soft text-accent' : 'text-muted hover:bg-surface-2 hover:text-ink' }}">
                                <x-icon :name="$item['icon']" />
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </nav>

    <div class="border-t border-line pt-4">
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 transition hover:bg-surface-2">
            <span class="grid size-9 shrink-0 place-items-center rounded-full bg-accent-soft text-sm font-semibold text-accent">
                {{ Str::upper(Str::substr(auth()->user()->name, 0, 1)) }}
            </span>
            <span class="min-w-0">
                <span class="block truncate text-sm font-semibold">{{ auth()->user()->name }}</span>
                <span class="block truncate text-xs text-muted">{{ auth()->user()->email }}</span>
            </span>
        </a>

        <div class="mt-2 flex gap-2">
            <button type="button" class="btn-ghost flex-1" @click="set(mode === 'dark' ? 'light' : 'dark')">
                <x-icon name="moon" x-show="mode !== 'dark'" />
                <x-icon name="sun" x-show="mode === 'dark'" x-cloak />
                <span x-text="mode === 'dark' ? 'Terang' : 'Gelap'"></span>
            </button>

            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button class="btn-ghost w-full"><x-icon name="logout" /> Keluar</button>
            </form>
        </div>
    </div>
</aside>
