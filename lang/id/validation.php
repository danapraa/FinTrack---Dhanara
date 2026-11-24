<?php

return [
    'required' => ':attribute wajib diisi.',
    'email' => 'Format :attribute tidak valid.',
    'unique' => ':attribute sudah digunakan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'min' => [
        'string' => ':attribute minimal :min karakter.',
        'numeric' => ':attribute minimal :min.',
    ],
    'max' => [
        'string' => ':attribute maksimal :max karakter.',
        'numeric' => ':attribute maksimal :max.',
    ],
    'string' => ':attribute harus berupa teks.',
    'numeric' => ':attribute harus berupa angka.',
    'date' => ':attribute bukan tanggal yang valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'in' => ':attribute yang dipilih tidak valid.',

    'attributes' => [
        'name' => 'Nama',
        'email' => 'Email',
        'password' => 'Kata sandi',
    ],
];
