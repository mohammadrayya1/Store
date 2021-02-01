<?php
namespace PHPMVC\Controllers;

use PHPMVC\lib\fileupload;
use PHPMVC\lib\helper;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\productscategoriesModel;
use PHPMVC\lib\validate;


class ProductscategoriesController extends AbstractConroller
{


    use helper;

    private $_createActionRoles =
    [
        'Name'          => 'req|alphanum|between(3,40)',


    ];

    public function defultAction()
    {
        $this->language->load('templet.templet');
        $this->language->load('productscategories.default');

        $this->_data['productscategories'] = productscategoriesModel::getAll();

        $this->view();
    }

    public function createAction()
    {

        $this->language->load('templet.templet');
        $this->language->load('productscategories.create');
        $this->language->load('productscategories.labels');
        $this->language->load('productscategories.messages');
        $this->language->load('validate.errors');

        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $productscategories = new productscategoriesModel();

            $productscategories->Name = $_POST['Name'];

            $file=new Fileupload($_FILES['Image']);
            $productscategories->Image=$file->upload()->getFileName();




            if($productscategories->save()) {

                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productscategories');
        }

        $this->view();
    }

    public function editAction()
    {

        $id=$this->params[0];
        $productscategories = productscategoriesModel::getByPK($id);

        if($productscategories === false) {
            $this->redirect('/productscategories');
        }

        $this->_data['productscategories'] = $productscategories;

        $this->language->load('templet.templet');
        $this->language->load('productscategories.create');
        $this->language->load('productscategories.labels');
        $this->language->load('productscategories.messages');
        $this->language->load('validate.errors');


        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {


            if(!empty($_FILES['Image']['name']))
            {

                if(file_exists(IMAGES_UPLOAD_STORAGE.ds.$productscategories->Image))
                {
                    unlink(IMAGES_UPLOAD_STORAGE.ds.$productscategories->Image);
                }


                $file=new Fileupload($_FILES['Image']);
                $productscategories->Image=$file->upload()->getFileName();

            }

            $productscategories->Name = $_POST['Name'];



            if($productscategories->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/productscategories');
        }

        $this->view();
    }

    public function deleteAction()
    {

        $id = $this->params[0];
        $productscategories = productscategoriesModel::getByPK($id);

        if($productscategories === false) {
            $this->redirect('/productscategories');
        }

        $this->language->load('productscategories.messages');

        if($productscategories->delete()) {
            if(file_exists(IMAGES_UPLOAD_STORAGE.ds.$productscategories->Image))
            {
                unlink(IMAGES_UPLOAD_STORAGE.ds.$productscategories->Image);
            }

            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/productscategories');
    }
}