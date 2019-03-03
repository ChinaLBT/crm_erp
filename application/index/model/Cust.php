<?php
    namespace app\index\model;
    use think\Model;

    class Cust extends Model {
        public function allCust($page) {
            $cust = $this->where('state','0')
                         ->limit($page,10)
                         ->order('time','desc')
                         ->select();
            return $cust;
        }

        public function addCust($data) {
            $data['address'] = $data['province'].$data['city'].$data['area'].$data['address'];
            $data['uid'] = time().rand(100000,999999);
            $data['time'] = time();

            $this -> insert($data);
        }
    }
?>