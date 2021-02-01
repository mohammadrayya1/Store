<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\helper;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\PriviligModel;
use PHPMVC\Models\UsergrouppriviligModel;
use PHPMVC\lib\Registry;

class PriviligController extends AbstractConroller
{
    use helper;


    function defultAction()

    {

        $this->language->load('templet.templet');
        $this->language->load('privilig.defult');
        $this->_data['privilig']= PriviligModel::getAll();

        $this->view();


    }


    function createAction()

    {

        $this->language->load('templet.templet');
        $this->language->load('privilig.create');
        $this->language->load('privilig.labels');


if(isset($_POST['submit']))
{
    $privilig=new PriviligModel();
    $privilig->PriviligTitle=$_POST['PrivilegeTitle'];
    $privilig->Privilege=$_POST['Privilege'];


    if($privilig->save())
    {
        $this->messenger->add("تم حفظ الصلاحية بنجاح",Messenger::APP_MESSEGE_ERROR);
        $this->redirect("/privilig");
    };
}

        $this->view();


    }





    function editAction()
    {
        $this->language->load('templet.templet');
        $this->language->load('privilig.create');
        $this->language->load('privilig.labels');
        $id=$this->params[0];
        $privilig=PriviligModel::getByPK($id);

        $this->_data['privilig']=$privilig;




        if(isset($_POST['submit'])){

            $privilig->PriviligTitle=$_POST['PrivilegeTitle'];
            $privilig->Privilege=$_POST['Privilege'];

            if($privilig->save())
            {
                $_SESSION['message']="The privilig Is updated";
                $this->redirect("/privilig");
            };
        }
        $this->view();
    }






public function deleteAction()
{

    $id=$this->params[0];
    $privilig=PriviligModel::getByPK($id);



    $usergroupprivilig=UsergrouppriviligModel::getBy(['PrivilegeId'=>$privilig->PrivilegeId]);

  if($usergroupprivilig !==false)
    {
     foreach ($usergroupprivilig as $usergroupprivilig)
     {
         $usergroupprivilig->delete();
     }
    }

        if($privilig->delete())
        {
            $_SESSION['message']="The privilig Is deleted";
            $this->redirect("/privilig");
        };

    $this->view();


}



}