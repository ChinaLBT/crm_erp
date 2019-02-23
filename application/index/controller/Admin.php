<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Admin extends Controller {
    public function index() {
        return view('index/admin-list');
    }

    public function admin_add() {
        return view('index/admin-add');
    }

    public function admin_role() {
        return view('index/admin-role');
    }

    public function role_add() {
        return view('index/role-add');
    }
}

?>