<?php

namespace CodeMaster\Permission\Exceptions;

use InvalidArgumentException;

class PermissionAlreadyExists extends InvalidArgumentException
{
    /**
     * @param string $permissionName
     * @param string $guardName
     * @return PermissionAlreadyExists
     */
    public static function create(string $permissionName, string $guardName)
    {
        return new static("A `{$permissionName}` permission already exists for guard `{$guardName}`.");
    }
}
