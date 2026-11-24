<?php

if (! function_exists('rupiah')) {
    function rupiah(int|float|string|null $amount, bool $symbol = true): string
    {
        $amount = (float) $amount;
        $sign = $amount < 0 ? '−' : '';
        $formatted = number_format(abs($amount), 0, ',', '.');

        return $sign . ($symbol ? 'Rp ' : '') . $formatted;
    }
}
