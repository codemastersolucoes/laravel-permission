<?php

namespace CodeMaster\Permission\Exceptions;

use InvalidArgumentException;

class PermissionDoesNotExist extends InvalidArgumentException
{
    /**
     * @param string $permissionName
     * @param string $guardName
     * @return PermissionDoesNotExist
     */
    public static function create(string $permissionName, string $guardName = '')
    {
        return new static("There is no permission named `{$permissionName}` for guard `{$guardName}`.");
    }

    /**
     * @param int $permissionId
     * @return PermissionDoesNotExist
     */
    public static function withId(int $permissionId)
    {
        return new static("There is no [permission] with id `{$permissionId}`.");
    }
}
