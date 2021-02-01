<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\ClientsModel;

class ClientsController extends AbstractConroller
{
    function defultAction()

    {

        $this->language->load('templet.templet');
        $this->language->load('clients.defult');
        $this->_data['clients']=ClientsModel::getAll();

        $this->view();


    }
}