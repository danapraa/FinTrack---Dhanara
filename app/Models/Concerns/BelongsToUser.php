<?php

namespace App\Models\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait BelongsToUser
{
    protected static function bootBelongsToUser(): void
    {
        // Saat ada pengguna yang login, hanya data miliknya yang bisa dibaca.
        static::addGlobalScope('owner', function (Builder $query) {
            if (Auth::check()) {
                $query->where($query->getModel()->getTable() . '.user_id', Auth::id());
            }
        });

        // Data baru otomatis menjadi milik pengguna yang sedang login.
        static::creating(function ($model) {
            if (! $model->user_id && Auth::check()) {
                $model->user_id = Auth::id();
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
