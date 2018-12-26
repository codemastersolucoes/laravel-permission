<?php

namespace CodeMaster\Permission\Exceptions;

use InvalidArgumentException;

class RoleAlreadyExists extends InvalidArgumentException
{
    /**
     * @param string $roleName
     * @param string $guardName
     * @return RoleAlreadyExists
     */
    public static function create(string $roleName, string $guardName)
    {
        return new static("A role `{$roleName}` already exists for guard `{$guardName}`.");
    }
}
