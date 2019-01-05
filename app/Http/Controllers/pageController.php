<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class pageController extends Controller
{

    public function index()
    {
        $pages = new Models\Page();
        $default_pageid = intval(DB::select('SELECT * FROM `settings` WHERE `_key` = ?' ,['default_page'])[0]->value);
        $page = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?',[$default_pageid]);
        $pages = $pages->getAllPage();
        if(count($page) == 0){
            return response()->view('error', ['error' => 'Default page dont exists'], 200);
        }
        return view('page',['pages' => $pages,'page_title' => $page[0]->page_title,'page_body' => $page[0]->page_body]);
               
    }
    public function show($id)
    {
        $pages = new Models\Page();
        $page = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?',[$id]);
        if(count($page) == 0){
            return view('error',['error' => 'Page not exist']);
        }
        $pages = $pages->getAllPage();
        return view('page',['pages' => $pages,'page_title' => $page[0]->page_title,'page_body' => $page[0]->page_body]);
    }
}
