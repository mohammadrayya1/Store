<?php


namespace PHPMVC\Controllers;
class AccessController extends AbstractConroller
{

    public function defultAction()
    {

        $this->language->load('templet.templet');
        $this->view();

    }



}