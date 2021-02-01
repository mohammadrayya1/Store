<?php


namespace PHPMVC\Controllers;


class notfoundController extends AbstractConroller
{

    function defultAction()
    {
        $this->language->load('templet.templet');

        $this->view();
    }
}