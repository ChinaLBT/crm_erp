<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\User;
use app\index\model\Cust;

class Index extends Controller {

    public function index() {
        if (input('?post.name')) {
            $data = [
                'name' => input('post.name'),
                'passwd' => input('post.passwd')
            ];
            $login = new User();
            if ($login->login($data) == 1) {
                session('name',$data['name'],'think');
                Trace(session('name'));
                return 1;
            } elseif ($login->login($data) == 2) {
                return "密码错误";
            } else {
                return "未查询到该账号";
            }
        }
        if (session('?name')) {
            return view('index');
        } else {
            return view('index/login');
        }
    }

    public function welcome() {
        $cust = new Cust();
        $data = array(
            'php_version' => PHP_VERSION,
            'php_sapi_name' => php_sapi_name(),
            'php_os' => PHP_OS,
            'upload_max_filesize' => get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件",
            'max_execution_time' => get_cfg_var("max_execution_time")."s",
            'cust_all' => $cust->where('state=0')->count('state'),
            'cust_del' => $cust->where('state=1')->count('state')
            // 'mysql_get_server_info' => mysqli_get_server_info(),
        );
        $this->assign('time',time());
        return $this->fetch('welcome',$data);
    }

    public function clear_temp_cahce() {
        array_map('unlink', glob(TEMP_PATH . '/*.php'));
        rmdir(TEMP_PATH);
        $this->redirect('/');
    }

    public function exit() {
        session(null);
        $this->redirect('/');
    }
}
?>