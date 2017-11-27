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
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
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