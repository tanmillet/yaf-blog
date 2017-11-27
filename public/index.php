<?php
/* 指向public的上一级 */
define("APP_PATH", realpath(dirname(__FILE__).'/../'));

$app = new Yaf_Application(APP_PATH."/conf/application.ini");

// $app->execute("main");
//
// function main() {
//
//     echo "this is test";
// }
$app->bootstrap()
    ->run();

