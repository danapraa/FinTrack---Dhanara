<?php

return [
    'required' => ':attribute wajib diisi.',
    'email' => 'Format :attribute tidak valid.',
    'unique' => ':attribute sudah digunakan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'string' => ':attribute harus berupa teks.',
    'numeric' => ':attribute harus berupa angka.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'boolean' => ':attribute harus bernilai benar atau salah.',
    'date' => ':attribute bukan tanggal yang valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'in' => ':attribute yang dipilih tidak valid.',
    'regex' => 'Format :attribute tidak valid.',
    'different' => ':attribute dan :other tidak boleh sama.',
    'after_or_equal' => ':attribute harus berupa tanggal pada atau setelah :date.',
    'before_or_equal' => ':attribute harus berupa tanggal pada atau sebelum :date.',

    'min' => [
        'string' => ':attribute minimal :min karakter.',
        'numeric' => ':attribute minimal :min.',
    ],
    'max' => [
        'string' => ':attribute maksimal :max karakter.',
        'numeric' => ':attribute maksimal :max.',
    ],
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
    ],

    'attributes' => [
        // Akun
        'name' => 'Nama',
        'email' => 'Email',
        'password' => 'Kata sandi',
        'password_confirmation' => 'Konfirmasi kata sandi',

        // Dompet dan kategori
        'type' => 'Jenis',
        'color' => 'Warna',
        'icon' => 'Ikon',
        'initial_balance' => 'Saldo awal',

        // Transaksi dan transfer
        'amount' => 'Jumlah',
        'date' => 'Tanggal',
        'note' => 'Catatan',
        'wallet_id' => 'Dompet',
        'category_id' => 'Kategori',
        'from_wallet_id' => 'Dompet asal',
        'to_wallet_id' => 'Dompet tujuan',
        'fee' => 'Biaya admin',

        // Anggaran, target, tagihan, utang
        'limit' => 'Batas anggaran',
        'month' => 'Bulan',
        'title' => 'Judul',
        'target_amount' => 'Target jumlah',
        'saved_amount' => 'Dana terkumpul',
        'deadline' => 'Tenggat',
        'due_date' => 'Jatuh tempo',
        'frequency' => 'Frekuensi',
        'start_date' => 'Tanggal mulai',
        'end_date' => 'Tanggal selesai',
        'person' => 'Nama pihak terkait',
    ],
];
