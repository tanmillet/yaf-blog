<?php

/**
 * Created by PhpStorm.
 * Author Terry Lucas
 * Date 17.11.23
 * Time 16:42
 */
class ErrorController extends Yaf_Controller_Abstract
{

    /**
     * @author Terry Lucas
     * @param $exception
     */
    public function errorAction($exception)
    {
        $exception = $this->getRequest()->getException();
        try {
            throw $exception;
        } catch (Yaf_Exception_LoadFailed $e) {
            //加载失败
            die('Yaf_Exception_LoadFailed');
        } catch (Yaf_Exception $e) {
            //其他错误
            die('Yaf_Exception');
        }

        $this->getView()->assign("code", $exception->getCode());
        $this->getView()->assign("message", $exception->getMessage());
    }

}