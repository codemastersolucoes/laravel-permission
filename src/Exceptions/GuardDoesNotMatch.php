<?php

namespace CodeMaster\Permission\Exceptions;

use InvalidArgumentException;
use Illuminate\Support\Collection;

class GuardDoesNotMatch extends InvalidArgumentException
{
    /**
     * @param string $givenGuard
     * @param Collection $expectedGuards
     * @return GuardDoesNotMatch
     */
    public static function create(string $givenGuard, Collection $expectedGuards)
    {
        return new static("The given role or permission should use guard `{$expectedGuards->implode(', ')}` instead of `{$givenGuard}`.");
    }
}
