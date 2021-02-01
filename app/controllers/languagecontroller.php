<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\helper;

class LanguageController extends AbstractConroller
{
    use helper;

    function defultAction()
    {

        if ($_SESSION['lang'] == 'ar') {
            $_SESSION['lang'] = 'eng';
        } else {
            $_SESSION['lang'] = 'ar';
        }

        $this->redirect($_SERVER['HTTP_REFERER']);


    }
}