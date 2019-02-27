<?php
    namespace app\index\model;
    use think\Model;

    class Cust extends Model {
        public function allCust() {
            $cust = $this->where('state','1')
                         ->select();
            return $cust[0];
        }
    }
?>