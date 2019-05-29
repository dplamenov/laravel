<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

        if ($username == env('ADMIN_USERNAME') and $password == env('ADMIN_PASSWORD')) {
            $request->session()->put('islogged', true);
            return redirect('admin');
        } else {
            return view('error', ['error' => 'Wrong username or password']);
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
            return view('admin.allpage', ['pages' => 'No page', 'themes' => Theme::getAllTheme()]);
        }
        return view('admin.allpage', ['pages' => $pages, 'themes' => Theme::getAllTheme()]);
    }

    public function deletePage(Request $request, int $id)
    {

        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        $pages = new Models\Page;
        $pages = $pages->getAllPage();
        $default_page = DB::select('SELECT * FROM `settings` WHERE `_key` = ?', ["default_page"]);
        if ($id == intval($default_page[0]->value)) {
            return view('admin.allpage', ['pages' => $pages, 'error' => 'You can`t delete default page!', 'themes' => Theme::getAllTheme()]);
        } else {
            DB::delete('DELETE FROM `pages` WHERE `page_id` = ?', [$id]);
            return redirect(url('admin/page'));
        }


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

    public function setDefaultPage(Request $request)
    {
        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        $page_id = intval($request->post()['page_id']);
        DB::update("UPDATE `settings` SET `value` = ? WHERE `_key` = 'default_page'", [$page_id]);
        return redirect(url('admin/page'));
    }

    public function editPage(Request $request, $id)
    {
        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        $page = DB::select('SELECT * FROM `pages` WHERE `page_id` = ?', [intval($id)]);

        $page['page_id'] = $page[0]->page_id;
        $page['page_title'] = $page[0]->page_title;
        $page['page_body'] = $page[0]->page_body;

        unset($page[0]);
        return view('admin.editpage', ['page' => $page, 'title' => 'Edit: ' . $page['page_title']]);
    }

    public function storeEditPage(Request $request)
    {
        if (self::isLogged($request) == false) {
            return redirect('admin');
        }
        $data = $this->validate($request, [
            'page_id' => 'integer',
            'page_title' => 'min:5|max:12',
            'page_body' => 'min:10'
        ]);

        DB::update("UPDATE `pages` SET `page_title` = ? , `page_body` = ? WHERE `page_id` = ?",
            [$data['page_title'], $data['page_body'], $data['page_id']]);


        return redirect('admin');

    }

    public function changetheme(Request $request)
    {

    }

    public function account()
    {
        return view('account');
    }

}
