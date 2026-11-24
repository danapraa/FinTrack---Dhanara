<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Support\Palette;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class WalletController extends Controller
{
    public function index(): View
    {
        $wallets = Wallet::orderBy('name')->get();

        return view('wallets.index', [
            'wallets' => $wallets,
            'total' => $wallets->sum('balance'),
        ]);
    }

    public function create(): View
    {
        return view('wallets.form', ['wallet' => new Wallet()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Wallet::create($this->validated($request));

        return redirect()->route('wallets.index')->with('status', 'Dompet berhasil ditambahkan.');
    }

    public function edit(Wallet $wallet): View
    {
        return view('wallets.form', ['wallet' => $wallet]);
    }

    public function update(Request $request, Wallet $wallet): RedirectResponse
    {
        $wallet->update($this->validated($request));

        return redirect()->route('wallets.index')->with('status', 'Dompet berhasil diperbarui.');
    }

    public function destroy(Wallet $wallet): RedirectResponse
    {
        $wallet->delete();

        return redirect()->route('wallets.index')->with('status', 'Dompet dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'type' => ['required', Rule::in(array_keys(Wallet::TYPES))],
            'color' => ['required', Rule::in(Palette::COLORS)],
            'initial_balance' => ['nullable', 'integer', 'min:0', 'max:999999999999'],
        ]);

        $data['initial_balance'] ??= 0;

        return $data;
    }
}
