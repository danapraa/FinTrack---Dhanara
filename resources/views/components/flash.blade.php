@if (session('status'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3500)" x-show="show" x-transition.opacity
         class="fixed inset-x-0 top-4 z-[60] mx-auto w-fit max-w-[90vw] rounded-full bg-ink px-5 py-2.5 text-sm font-medium text-canvas shadow-soft"
         role="status">
        {{ session('status') }}
    </div>
@endif
