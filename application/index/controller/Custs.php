<?php
    namespace app\index\controller;
    use think\Controller;
    use think\Request;
    use app\index\model\Cust;

    class Custs extends Controller {
        public function cust_list($page=0) {
            $cust = new Cust();
            $custs = $cust -> allCust($page);
            $cust_all = $cust->where('state=0')->count('state');
            $this -> assign('cust_all',$cust_all);
            $this -> assign('data',$custs);
            return $this->fetch('index/cust-list');
            // print_r($data);
        }

        public function cust_del() {

        }

        public function cust_add() {
            return $this->fetch('index/cust-add');
        }

        public function cust_add_con() {
            $cust = new Cust();
            $cust_add = $cust -> addCust(input('post.'));
            return $cust_add;
        }
    }
?>