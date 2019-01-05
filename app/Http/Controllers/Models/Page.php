<?php

namespace App\Http\Controllers\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getAllPage()
    {
        $pages = DB::select('SELECT * FROM `pages`');
        return $pages;
    }

}