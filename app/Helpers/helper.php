<?php

if (! function_exists('formatCurrencyToBr')) {
    function formatCurrencyToBr(mixed $value): string
    {
        return number_format((float) $value, 2, ',', '.');
    }
}

if (! function_exists('formatCurrencyFromBr')) {
    function formatCurrencyFromBr(mixed $value): string
    {
        $value = str_replace(['.', ','], ['', '.'], $value);

        return number_format((float) $value, 2, '.', '');
    }
}
