<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{

    private static function isLogged(Request $request)
    {
        if ($request->session()->get('islogged') != true) {
            return false;
        }
        return true;
    }

    public function index(Request $request)
    {

        if ($request->session()->get('islogged') == true) {
            return view('admin.logged');
        } else {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $data = $this->validate($request, [
            'username' => 'min:3|max:20',
            'password' => 'min:2'

        ]);

        $username = $data['username'];
        $password = $data['password'];

        $count = DB::select('SELECT COUNT(*) as count FROM `admin` WHERE `username` = ? and `password` = ?', [$username, $password])[0]->count;
        if ($count == 1) {
            $request->session()->put('islogged', true);
            return redirect('admin');
        } else {
            return view('error', ['error' => 'No such that admin at database']);
        }

    }

    public function logout(Request $request)
    {
        $request->session()->put('islogged', false);
        return redirect('admin');
    }

    public function viewPage(Request $request)
    {
        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        $pages = new Models\Page();
        $pages = $pages->getAllPage();
        if (count($pages) == 0) {
            return view('admin.allpage', ['pages' => 'No page']);
        }
        return view('admin.allpage', ['pages' => $pages]);
    }

    public function deletePage(Request $request, int $id)
    {
        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        DB::delete('DELETE FROM `pages` WHERE `page_id` = ?', [$id]);
        return redirect(url('admin/page'));
    }

    public function createPage(Request $request)
    {
        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        return view('admin.createpage');

    }

    public function storePage(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'min:5|max:11',
            'body' => 'min:10'

        ]);

        $title = $data['title'];
        $body = $data['body'];

        DB::insert("INSERT INTO `pages` (`page_id`, `page_title`, `page_body`)
VALUES (null, ?, ?)", [$title, $body]);

        return redirect(url('/'));


    }

    public function setDefaultPage(Request $request){
        $page_id = intval($request->post()['page_id']);
        DB::update("UPDATE `settings` SET `value` = ? WHERE `_key` = 'default_page'",[$page_id]);
        return redirect(url('admin/page'));
    }

}
