<?php


namespace PHPMVC\Lib;

use PHPMVC\LIB\SessionManager;
class Authentication
{
    private $_exuteaccess=
        [
            '/index/defult',
            '/auth/logout',
            '/language/defult',
            '/access/defult',
            '/notfound/defult',
            '/auth/login',
            '/test/defult'



        ];

    private static $_instance;
    private $_session;

    private function __construct($session)

    {
        $this->_session=$session;
    }
    private function __clone()
    {

    }

    public static function getInstance(SessionManager $session)
    {
        if(self::$_instance ===null)
        {
          self::$_instance=new self($session);
        }
        return  self::$_instance;
    }


    public  function isAuthorized()
    {

     return isset($this->_session->u);
    }


    public  function isAccess($controller,$action)
    {
    $url=strtolower('/'.$controller.'/'.$action);


    if(in_array($url,$this->_exuteaccess)||in_array($url,$this->_session->u->privileges))
    {
    
        return true;

    }else
        {
           return false;
        }

    }

}
