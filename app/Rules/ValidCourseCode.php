<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCourseCode implements ValidationRule
{
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail
    ): void {
        if (! is_string($value) || ! preg_match('/^[A-Z]{3,7}\d$/', $value)) {
            $fail('The :attribute must contain 3 to 7 uppercase letters followed by one digit, such as BSIT1.');
        }
    }
}