<?php
namespace PHPMVC\Controllers;



use PHPMVC\lib\validate;
use PHPMVC\Models\PriviligModel;
use PHPMVC\Models\UsergrouppriviligModel;

class TestController extends AbstractConroller
{
    use validate;
    function defultAction()
    {


      echo md5("Mohammad");

    }



}