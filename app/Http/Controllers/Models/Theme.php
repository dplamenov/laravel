<?php


namespace App\Http\Controllers\Models;


class Theme
{
    public static function getAllTheme()
    {
        return ['default', 'modern'];
    }
}