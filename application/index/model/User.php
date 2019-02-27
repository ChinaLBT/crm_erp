<?php
    namespace app\index\model;
    use think\Model;

    class User extends Model {

        public function login($data = null) {
            $userName = $this->where('name',$data['name'])
                            ->find();
            if ($userName) {
                $userInfo = $userName->where('passwd',$data['passwd'])
                                    ->find();
                return $userInfo?true:2;
            } else {
                return 0;
            }
        }
    }
?>