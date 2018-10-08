<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class pageController extends Controller
{

    public function index()
    {
      
        $default_pageid = intval(DB::select('SELECT * FROM `settings` WHERE `_key` = ?' ,['default_page'])[0]->value);
        $pages = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?',[$default_pageid]);
        return view('page',['page_title' => $pages[0]->page_title,'page_body' => $pages[0]->page_body]);     
               
    }
    public function show($id)
    {
        $pages = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?',[$id]);
        if(count($pages) == 0){
            return view('error',['error_type' => 'Page not exist']);
        }
        return view('page',['page_title' => $pages[0]->page_title,'page_body' => $pages[0]->page_body]);            
    }
}
