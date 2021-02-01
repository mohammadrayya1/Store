<?php
namespace PHPMVC\Controllers;

use PHPMVC\lib\helper;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\SupplierModel;
use PHPMVC\lib\validate;


class SupplieresController extends AbstractConroller
{


    use helper;

    private $_createActionRoles =
    [
        'Name'          => 'req|alpha|between(3,40)',
        'Email'         => 'req|email',
        'PhoneNumber'   => 'alphanum|max(15)',
        'Adress'       => 'req|alphanum|max(50)'
    ];

    public function defultAction()
    {
        $this->language->load('templet.templet');
        $this->language->load('supplieres.default');
        $this->_data['supplieres'] = SupplierModel::getAll();

        $this->view();
    }

    public function createAction()
    {

        $this->language->load('templet.templet');
        $this->language->load('supplieres.create');
        $this->language->load('supplieres.labels');
        $this->language->load('supplieres.messages');
        $this->language->load('validate.errors');

        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $supplier = new SupplierModel();

            $supplier->Name = $_POST['Name'];
            $supplier->Email = $_POST['Email'];
            $supplier->PhoneNumber =$_POST['PhoneNumber'];
            $supplier->Adress = $_POST['Address'];

            if($supplier->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/supplieres');
        }

        $this->view();
    }

    public function editAction()
    {

        $id=$this->params[0];
        $supplier = SupplierModel::getByPK($id);

        if($supplier === false) {
            $this->redirect('/supplieres');
        }

        $this->_data['supplier'] = $supplier;

        $this->language->load('templet.templet');
        $this->language->load('supplieres.create');
        $this->language->load('supplieres.labels');
        $this->language->load('supplieres.messages');
        $this->language->load('validate.errors');


        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $supplier->Name = $_POST['Name'];
            $supplier->Email =$_POST['Email'];
            $supplier->PhoneNumber =_POST['PhoneNumber'];
            $supplier->Adress = $_POST['Address'];

            if($supplier->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/supplieres');
        }

        $this->view();
    }

    public function deleteAction()
    {

        $id = $this->_params[0];
        $supplier = SupplierModel::getByPK($id);

        if($supplier === false) {
            $this->redirect('/supplieres');
        }

        $this->language->load('supplieres.messages');

        if($supplier->delete()) {
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/supplieres');
    }
}