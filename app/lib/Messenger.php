<?php


namespace PHPMVC\lib;


class Messenger
{

    const APP_MESSEGE_SUCCESS =  1;
    const APP_MESSEGE_ERROR   =  2;
    const APP_MESSEGE_WARNING =  3;
    const APP_MESSEGE_INFO    =   4;

    private static $_instance;
    private $_session;//هون بحط اوبجيكت السيشن
    private $_messages=[];

    private function __construct($session)
    {
        $this->_session=$session;
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function getInstance( SessionManager $session)
    {
        if(self::$_instance===null)
        {
            self::$_instance=new self($session);
        }
        return self::$_instance;
    }

    public  function add($messeges,$type=self::APP_MESSEGE_SUCCESS)
    {
        if(!$this->messegesExist())
        {
         $this->_session->messages=[];
        }

        $msgs= $this->_session->messages;
        $msgs[]=[$messeges,$type];
        $this->_session->messages=$msgs;
    }




  private function messegesExist()
  {
      return isset($this->_session->messages);
  }







  public function getmesseges()
  {
      if($this->messegesExist())
      {
         $this->_messages=$this->_session->messages;
         unset($this->_session->messages);
         return  $this->_messages;
      }
return [];


  }
}