<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Order extends Controller {
    public function index() {
        $this->assign('time',time());
        return view('index/order-list');
    }
}
?>