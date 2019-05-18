<?php


namespace App\Http\Controllers\Models;


class Theme
{
    public function getAllTheme()
    {
        return ['default', 'modern'];
    }
}