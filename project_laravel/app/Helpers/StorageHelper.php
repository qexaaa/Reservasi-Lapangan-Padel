<?php

namespace App\Helpers;

class StorageHelper
{
    /**
     * Generate URL untuk file yang ada di public folder
     */
    public static function url($path)
    {
        if (empty($path)) {
            return '';
        }

        return asset($path);
    }
}
