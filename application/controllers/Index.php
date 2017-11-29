<?php

class IndexController extends Yaf_Controller_Abstract
{
    public function init()
    {
        $this->db = Yaf_Registry::get('db');
    }

    public function indexAction()
    {//默认Action
        $res = $this->db->select(
            'cat',
            [
                'name',
                'value',
            ]
        );

        txtlog('数据' , json_encode($res));
        $this->getView()->assign("content", "Hello World");
        $this->getView()->assign("res", $res);

        return TRUE;
    }
}