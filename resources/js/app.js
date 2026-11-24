import Alpine from 'alpinejs';

window.Alpine = Alpine;

const KEY = 'dhanara-theme';

Alpine.data('theme', () => ({
    mode: 'light',

    init() {
        try { this.mode = localStorage.getItem(KEY) || 'light'; } catch (e) {}
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (this.mode === 'system') this.apply();
        });
    },

    set(mode) {
        this.mode = mode;
        try { localStorage.setItem(KEY, mode); } catch (e) {}
        this.apply();
    },

    apply() {
        const dark = this.mode === 'dark'
            || (this.mode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
        document.documentElement.classList.toggle('dark', dark);
        document.querySelector('meta[name="theme-color"]')
            ?.setAttribute('content', dark ? '#151715' : '#faf7f2');
    },
}));

Alpine.start();
