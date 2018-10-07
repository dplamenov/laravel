<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pageController extends Controller
{

    public function index($id = null)
    {
        if(is_numeric($id)){
            $pages = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?',[$id]);
            if(count($pages) == 0){
                return view('error',['error_type' => 'Page not exist']);
            }
            return view('page',['page_title' => $pages[0]->page_title,'page_body' => $pages[0]->page_body]);                                       
        }else{
            $default_pageid = intval(DB::select('SELECT * FROM `settings` WHERE `_key` = ?' ,['default_page'])[0]->value);
            $pages = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?',[$default_pageid]);
            return view('page',['page_title' => $pages[0]->page_title,'page_body' => $pages[0]->page_body]);     
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
