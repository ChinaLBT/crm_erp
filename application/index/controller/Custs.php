<?php
    namespace app\index\controller;
    use think\Controller;
    use think\Request;
    use app\index\model\Cust;

    class Custs extends Controller {
        public function cust_list() {
            $cust = new Cust();
            $custs = $cust->allCust();
            $data = array(
                'name' => $custs['name'],
                'phone' => $custs['phone'],
                'sex' => $custs['sex'],
                'address' => $custs['address'],
                'level' => $custs['level'],
                'other' => $custs['other']
            );
            return $this->fetch('index/cust-list',$data);
        }

        public function cust_del() {

        }
    }
?>