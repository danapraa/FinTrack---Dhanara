<?php

return [
    'groups' => [
        'Utama' => [
            ['label' => 'Beranda',   'route' => 'dashboard',          'icon' => 'home',   'match' => 'dashboard'],
            ['label' => 'Transaksi', 'route' => 'transactions.index', 'icon' => 'swap',   'match' => 'transactions.*'],
            ['label' => 'Dompet',    'route' => 'wallets.index',      'icon' => 'wallet', 'match' => 'wallets.*'],
            ['label' => 'Kategori',  'route' => 'categories.index',   'icon' => 'tag',    'match' => 'categories.*'],
        ],
        'Perencanaan' => [
            ['label' => 'Anggaran',         'route' => 'budgets.index', 'icon' => 'pie',      'match' => 'budgets.*'],
            ['label' => 'Target Tabungan',  'route' => 'goals.index',   'icon' => 'target',   'match' => 'goals.*'],
            ['label' => 'Tagihan',          'route' => 'bills.index',   'icon' => 'calendar', 'match' => 'bills.*'],
            ['label' => 'Utang & Piutang',  'route' => 'debts.index',   'icon' => 'scale',    'match' => 'debts.*'],
        ],
        'Analisis' => [
            ['label' => 'Laporan', 'route' => 'reports.index', 'icon' => 'chart', 'match' => 'reports.*'],
        ],
    ],
];
