<?php

namespace App\Mixins;

use Closure;
use Illuminate\Support\Str;

/**
 * @mixin Str
 */
class StrMixin
{
    public function isEmail(): Closure
    {
        return function (mixed $text): bool {
            return filter_var($text, FILTER_VALIDATE_EMAIL);
        };
    }
}
