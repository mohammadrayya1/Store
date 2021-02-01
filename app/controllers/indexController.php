<?php
namespace PHPMVC\Controllers;

class IndexController extends AbstractConroller
{
function defultAction()
{


$this->language->load('templet.templet');
$this->language->load('index.defult');
  $this->view();


}
    function addAction()
    {
        $this->view();

    }
}

