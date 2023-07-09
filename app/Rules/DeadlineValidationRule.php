<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class DeadlineValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        $currentDate = now()->startOfDay();
        $deadlineDate = \Carbon\Carbon::parse($value)->startOfDay();

        return $deadlineDate->isAfter($currentDate);
    }

    public function message()
    {
        return 'Tanggal deadline harus minimal satu hari setelah hari ini.';
    }
}
