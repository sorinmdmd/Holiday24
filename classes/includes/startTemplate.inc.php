<?php
    //startTemplate.inc.php
    $ROOT_DIR='./'; 
    require_once("$ROOT_DIR/classes/smarty/libs/Smarty.class.php");
    $smarty=new Smarty();
    $smarty->setTemplateDir("$ROOT_DIR/smarty/templates/");
    $smarty->setCompileDir("$ROOT_DIR/smarty/templates_c/");
    $smarty->setConfigDir("$ROOT_DIR/smarty/configs/");
    $smarty->setCacheDir("$ROOT_DIR/smarty/cache/");
?>