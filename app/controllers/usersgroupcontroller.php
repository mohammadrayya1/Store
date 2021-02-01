<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\helper;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\PriviligModel;
use PHPMVC\Models\UsergrouppriviligModel;
use PHPMVC\Models\UsersgroupModel;
use PHPMVC\Models\UsersgrouppriviligModel;


class UsersgroupController extends AbstractConroller
{


use helper;
    function defultAction()

    {

        $this->language->load('templet.templet');
        $this->language->load('usersgroup.defult');
        $this->_data['usersgroup']=UsersgroupModel::getAll();

        $this->view();


    }

    function createAction()

    {

        $this->language->load('templet.templet');
        $this->language->load('usersgroup.create');
        $this->language->load('usersgroup.labels');
        $this->_data['privilig']= PriviligModel::getAll();




        if(isset($_POST['submit']))
        {
            $usersgroup=new UsersgroupModel();
            $usersgroup->GroupName=$_POST['GroupName'];

         if ($usersgroup->save())
         {
             if(isset($_POST['privileges'])&& is_array($_POST['privileges']))
             {
                foreach ($_POST['privileges'] as  $usersgrouppriviligid)
                {
                    $usersgroupprivilig=new UsergrouppriviligModel();
                    $usersgroupprivilig->GroupId=$usersgroup->GroupId;
                    $usersgroupprivilig->PrivilegeId=$usersgrouppriviligid;
                    $usersgroupprivilig->save();


                }
                 $this->redirect("/usersgroup");

             }


         }

        }

        $this->view();


    }





    function editAction()
    {

        $id=$this->params[0];
        $Usersgroup=UsersgroupModel::getByPK($id);
        if($Usersgroup==false)
        {
            $this->redirect('/usersgroup');
        }


        $this->language->load('templet.templet');
        $this->language->load('usersgroup.create');
        $this->language->load('usersgroup.labels');
        $this->language->load('usersgroup.edit');
        $this->_data['Usersgroup']=$Usersgroup;
        $this->_data['privilig']= PriviligModel::getAll();

        $usersgroupprivilig=UsergrouppriviligModel::getBy(["GroupId"=>$Usersgroup->GroupId]);
        $usersgrouppriviligid=[];

        foreach ($usersgroupprivilig as $usersgroupprivilig)
        {
            $usersgrouppriviligid[]=$usersgroupprivilig->PrivilegeId;
        }

        $this->_data['usersgrouppriviligid']=$usersgrouppriviligid;



        if(isset($_POST['submit'])) {

            if ($Usersgroup->save()) {
                if (isset($_POST['privileges']) && is_array($_POST['privileges'])) {

                    $usersgrouppriviligdeleted=array_diff($this->_data['usersgrouppriviligid'],$_POST['privileges']);
                    $usersgrouppriviligadd=array_diff($_POST['privileges'],$usersgrouppriviligid);
                    foreach ( $usersgrouppriviligdeleted as  $priviligdeleted)
                    {
                        $unwanted=UsergrouppriviligModel::getBy(['PrivilegeId'=>$priviligdeleted,'GroupId'=>$Usersgroup->GroupId]);
                        $unwanted->current()->delete();

                    }

                    foreach ($usersgrouppriviligadd as $usersgrouppriviligid) {
                        $usersgroupprivilig = new UsergrouppriviligModel();
                        $usersgroupprivilig->GroupId = $Usersgroup->GroupId;
                        $usersgroupprivilig->PrivilegeId = $usersgrouppriviligid;
                        $usersgroupprivilig->save();
                    }
                }
                $this->redirect("/usersgroup");
            }
        }

            $this->view();
    }


    function deleteAction()
    {

        $id=$this->params[0];
        $Usersgroup=UsersgroupModel::getByPK($id);
        if($Usersgroup==false)
        {
            $this->redirect('/usersgroup');
        }


        $usersgroupprivilig=UsergrouppriviligModel::getBy(["GroupId"=>$Usersgroup->GroupId]);


        foreach ($usersgroupprivilig as $usersgroupprivilig)
        {
            $usersgroupprivilig->delete();
        }
if( $Usersgroup->delete())
{
    $this->redirect('/usersgroup');
}

    }

}