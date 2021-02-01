<?php



namespace PHPMVC;

use PHPMVC\LIB\frontendcontroller;
use PHPMVC\lib\language;
use PHPMVC\lib\Messenger;
use PHPMVC\lib\Registry;
use PHPMVC\LIB\SessionManager;
use PHPMVC\lib\Templet\templet;
use PHPMVC\Lib\Authentication;

require_once('../app/config/config.php');
require_once ('../app/lib/autoload.php');



$session=new SessionManager();
$session->start();


if(!isset($session->lang))
{
    $session->lang=APP_DEFUALT_LANGUAGE;
}
$temp=require_once ('../app/config/templeteconfig.php');
$tempelet=new Templet($temp);
$language=new Language();
$messenger=Messenger::getInstance($session);

$Authentication=Authentication::getInstance($session);
$registry=Registry::getInstance();

$registry->session=$session;
$registry->language=$language;
$registry->messenger=$messenger;

$fontController=new frontendcontroller($tempelet,$registry,$Authentication);

$fontController->dispatch();



?>


