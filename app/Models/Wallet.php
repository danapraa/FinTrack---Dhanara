<?php

namespace App\Models;

use App\Models\Concerns\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use BelongsToUser;

    public const TYPES = [
        'cash' => 'Tunai',
        'bank' => 'Rekening bank',
        'ewallet' => 'E-wallet',
        'savings' => 'Tabungan',
        'other' => 'Lainnya',
    ];

    protected $fillable = ['name', 'type', 'color', 'initial_balance'];

    protected function casts(): array
    {
        return ['initial_balance' => 'integer'];
    }

    /** Saldo saat ini. Di tahap transaksi, rumus ini ditambah pemasukan/pengeluaran/transfer. */
    public function getBalanceAttribute(): int
    {
        return $this->initial_balance;
    }

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? 'Lainnya';
    }
}
