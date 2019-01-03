<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class adminController extends Controller
{
    public function index(Request $request)
    {

        if($request->session()->get('islogged') == true){
            return view('logged');
        }else{
            return view('login');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function login(Request $request){
        $request_post = $request->post();


        $request->session()->put('islogged',true);

        return redirect('admin');

    }

    public function logout(Request $request){
        $request->session()->put('islogged',false);
        return redirect('admin');
    }
}
