<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Model;

class Index extends Controller {
    public function index() {
        if (input('?post.username')) {
            $username = input('post.username');
            session('name',$username,'think');
            Trace(session('name'));
        }
        if (session('?name')) {
            return view('index');
        } else {
            return view('index/login');
        }
    }

    public function welcome() {
        $data = array(
            'php_version' => PHP_VERSION,
            'php_sapi_name' => php_sapi_name(),
            'php_os' => PHP_OS,
            'upload_max_filesize' => get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件",
            'max_execution_time' => get_cfg_var("max_execution_time")."s",
            // 'mysql_get_server_info' => mysql_get_server_info(),
        );
        $this->assign('time',time());
        return $this->fetch('welcome',$data);
    }

    public function clear_temp_ahce() {
        array_map('unlink', glob(TEMP_PATH . '/*.php'));
        rmdir(TEMP_PATH);
        $this->redirect('/admin');
    }

    public function exit() {
        session(null);
        $this->redirect('/admin');
    }
}
?>