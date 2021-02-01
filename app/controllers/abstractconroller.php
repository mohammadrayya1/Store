<?php


namespace  PHPMVC\Controllers;


use PHPMVC\LIB\frontendcontroller;
use PHPMVC\lib\validate;

class AbstractConroller
{
    use validate;

    protected  $controller;
    protected $action;
    protected  $params;
    protected  $templet;
    protected  $_data=[];
    protected  $_registry;



public  function notfoundaction()
{
    $this->language->load('templet.templet');
    $this->language->load('notfound.notfound');
   $this->view();
}



public function __get($key)
{
  return  $this->_registry->$key;
}



    public function setcontroller($controller)
    {
        $this->controller = $controller;

    }
    public function setaction($action)
    {
        $this->action = $action;

    }
    public function setparams($params)
    {
        $this->params =array_shift($params);

    }
    public function settemplete($templet)
    {
        $this->templet  =$templet ;

    }
    public function setregistry($registry)
    {
        $this->_registry  =$registry ;

    }

    public function view()
    {


        $view=VIEWS_PATH.$this->controller.ds.$this->action.'.view.php';
      if($this->action==frontendcontroller::NOT_FOUND_ACTION ||!file_exists($view))
      {

     $view=VIEWS_PATH.'notfound'.ds.'defult.view.php';
      }
             $this->_data=array_merge($this->_data,$this->language->getdictionary());

              $this->templet->setRegistary($this->_registry);
              $this->templet->setactionview($view);
              $this->templet->setappdata($this->_data);
              $this->templet->renderApp();


    }


}