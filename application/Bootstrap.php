<?php

/**
 * Created by PhpStorm.
 * Author Terry Lucas
 * Date 17.11.23
 * Time 13:57
 */
class Bootstrap extends Yaf_Bootstrap_Abstract
{
    /**
     * @author Terry Lucas
     */
    public function _initConfig()
    {
        //把配置保存起来
        $this->arrConfig = Yaf_Application::app()->getConfig();
        Yaf_Registry::set('config', $this->arrConfig);
    }

    //载入数据库
    public function _initDatabase()
    {
        $db_config['server'] = $this->arrConfig->db->server;
        $db_config['username'] = $this->arrConfig->db->username;
        $db_config['password'] = $this->arrConfig->db->password;
        $db_config['database_name'] = $this->arrConfig->db->database_name;
        $db_config['database_type'] = $this->arrConfig->db->database_type;

        Yaf_Registry::set('db', new Medoo($db_config));
    }

    /**
     * @author Terry Lucas
     */
    public function _initLibrary()
    {
        Yaf_Loader::import('helper.php');
    }

    /**
     * @author Terry Lucas
     * @param Yaf_Dispatcher $dispatcher
     */
    public function _initDefaultName(Yaf_Dispatcher $dispatcher)
    {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }

    /**
     * @author Terry Lucas
     * @param Yaf_Dispatcher $dispatcher
     */
    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
        $user = new UserPlugin();
        $dispatcher->registerPlugin($user);
    }

    /**
     * @author Terry Lucas
     * @param Yaf_Dispatcher $dispatcher
     */
    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        /**
         * 添加配置中的路由
         */
        $router->addConfig(Yaf_Registry::get("config")->routes);
    }
}