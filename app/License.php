<?php

namespace rGuard;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $guarded = ['downloads'];

    protected $hidden = ['code'];

    /**
     * Generates a new license code.
     * @return string
     */
    public static function generateCode()
    {
        do {
            $code = str_random(5) . '-' . str_random(5) . '-' . str_random(5) . '-' . str_random(5);
        } while (License::whereCode($code)->count() > 0);
        return $code;
    }
}
