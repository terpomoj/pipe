<?php

use Terpomoj\Pipe\Pipe;

if (!function_exists('pipe')) {
    /**
     * Starting a pipe.
     * 
     * @param mixed $value The value to pipe.
     * @return Pipe
     */
    function pipe($value): Pipe
    {
        return new Pipe($value);
    }
}
