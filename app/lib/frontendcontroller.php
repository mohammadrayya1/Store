<?php



namespace PHPMVC\Lib;
use  PHPMVC\Lib\Registry;
use PHPMVC\lib\Templet\templet;
use PHPMVC\Lib\Authentication;
class frontendcontroller
{
    use helper;
    const NOT_FOUND_ACTION="notfoundaction";
    const NOT_FOUND_controller="PHPMVC\Controllers\\notfoundController";
    private $_controller="index";
    private $_action="defult";
    private $_params=[];
    private  $_templet;
    private  $_registry;
    private $_Authentication;

    public function __construct(Templet $templet,Registry $resgistry,Authentication $Authentication)
    {
        $this->_Authentication=$Authentication;
        $this->_registry=$resgistry;
        $this->_templet=$templet;
        $this->_parsurl();
    }

    private function _parsurl()
    {

 $url=explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),3);

        if(isset($url[0])&& !empty($url[0]))
        {
            $this->_controller=$url[0];
        };
        if(isset($url[1])&& !empty($url[1]))
        {
            $this->_action=$url[1];
        };
        if(isset($url[2])&& !empty($url[2]))
        {
            $url[2]=explode('/',$url[2]);
            $this->_params[]=$url[2];
        };



    }


    public  function dispatch()
    {
        $nameController='PHPMVC\Controllers\\'.ucfirst($this->_controller)."Controller";
        $actionname=$this->_action."Action";


        if(!$this->_Authentication->isAuthorized())
        {
          if($this->_controller !='auth'&& $this->_action !="login")
          {
              $this->redirect('/auth/login');
          }
         else{
            ($this->_controller =='auth'&& $this->_action =="login");
        }
        }


         if((bool)CHECK_FOR_PRIVILIGES===true)
         {

             if(!$this->_Authentication->isAccess($this->_controller,$this->_action))
             {
                 $this->redirect('/access');
             }

         }





        if(!class_exists($nameController)||!method_exists($nameController,$actionname))
        {
            $nameController=self::NOT_FOUND_controller;
            $this->_action=$actionname=self::NOT_FOUND_ACTION;


        }



        $classname=new $nameController();//  هون بنادي على صفحة indexController or notfoundcontroller

        $classname->setcontroller($this->_controller);
        $classname->setaction($this->_action);
        $classname->setparams($this->_params);
        $classname->settemplete($this->_templet);//هون معناتو اضفت كل الاوبجيكت متل ماهو
        $classname->setregistry($this->_registry);
        $classname->$actionname();




    }


}