<?php
namespace PHPMVC\Lib;

class  Autoload
{


    public  static  function autoload($classname)
    {

        $classname=str_replace('PHPMVC',"",$classname);
        $classname=str_replace("\\",'/',$classname);
        $classname=strtolower($classname);
         $classname.='.php';
         if(file_exists(APP_PATH.$classname))
         {
             require_once (APP_PATH.$classname);
         }


    }



}
spl_autoload_register(__NAMESPACE__.'\Autoload::autoload');







?>