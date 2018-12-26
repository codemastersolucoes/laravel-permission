<?php

namespace CodeMaster\Permission\Traits;

use CodeMaster\Permission\PermissionRegistrar;

trait RefreshesPermissionCache
{
    /**
     *
     */
    public static function bootRefreshesPermissionCache()
    {
        static::saved(function () {
            app(PermissionRegistrar::class)->forgetCachedPermissions();
        });

        static::deleted(function () {
            app(PermissionRegistrar::class)->forgetCachedPermissions();
        });
    }
}
