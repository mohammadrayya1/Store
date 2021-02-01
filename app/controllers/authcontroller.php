<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\helper;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\EmployeeModel;

class AuthController extends AbstractConroller
{   use helper;


    function loginAction()

    {
        $this->language->load('auth.login');
        $this->templet->swapTemplet([':view'=>':action_view']);

        if(isset($_POST['login']))

        {
            $username=$_POST['ucname'];
            $password=$_POST['ucpwd'];


            $user =EmployeeModel::authenticate($username,$password,$this->session);


         if($user==2)
         {
             $this->messenger->add($this->language->get('text_user_disabled'),Messenger::APP_MESSEGE_ERROR);


         }elseif($user==1)
             {
//                 $this->messenger->add($this->language->get('text_user_not_found'),Messenger::APP_MESSEGE_ERROR);
               $this->redirect("/");
             }
         elseif($user===false)
         {
             $this->messenger->add($this->language->get('text_user_not_found'),Messenger::APP_MESSEGE_ERROR);


         }
        }


        $this->view();


    }

    public  function logoutAction()
    {
        $this->session=false;
        unset($this->session->u);
        session_destroy();
        $this->redirect('/auth/login');
    }
}
