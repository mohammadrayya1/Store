<?php
namespace PHPMVC\Controllers;


use PHPMVC\lib\helper;
use PHPMVC\lib\Messenger;
use PHPMVC\Models\EmployeeModel;
use PHPMVC\Models\UsersgroupModel;
use PHPMVC\Models\UserprofileModel;

class EmployeeController extends AbstractConroller
{

use helper;


private $_createActionRoles=
    [
        'Username'  => 'req|alphanum',
        'Password'  =>'req|min(6)|eq_field(CPassword)',
        'CPassword' =>'req|min(6)',
        'Email'     =>'req|email|eq_field(CEmail)',
        'CEmail'    =>'req|email',
        'PhoneNumber' =>'alphanum|max(15)',
        'Firstname'  => 'req|alphanum',
        'Lastname'  => 'req|alphanum'
    ];

    private $_editActionRoles=
        [
         'PhoneNumber' =>'alphanum|max(15)',
            'GroupId'    =>'req|int'
        ];






    function defultAction()

    {
        $this->language->load('templet.templet');
        $this->language->load('employee.defult');
        $this->language->load('employee.labels');
        $this->language->load('employee.messeg');
        $this->_data['employee']=EmployeeModel::getAll();
        $this->view();


    }

    function createAction()
    {


        $this->language->load('templet.templet');
        $this->language->load('employee.create');
        $this->language->load('employee.labels');
        $this->language->load('validate.errors');
        $this->language->load('employee.messeg');
        $this->_data['groups']=UsersgroupModel::getAll();



        if(isset($_POST['submit']) &&  $this->isValid($this->_createActionRoles,$_POST))
        {


            $user=new EmployeeModel();

            $user->Username=$_POST['Username'];
            $user->cryptPassword($_POST['Password']);
            $user->Email=$_POST['Email'];
            $user->PhoneNumber=$_POST['PhoneNumber'];
            $user->GroupId=$_POST['GroupId'];
            $user->SubscriptionDate=date('Y-m-d ');
            $user->LastLogin=\date('Y-m-d H:i:s');
            $user->Status=1;


            if(EmployeeModel::userExists($user->Username))
            {

                $this->messenger->add($this->language->get('masseg_user_exist'),Messenger::APP_MESSEGE_ERROR);
                $this->redirect('/employee/create');
            }
            if(EmployeeModel::emailExists($user->Email))
            {
                $this->messenger->add($this->language->get('masseg_email_exist'),Messenger::APP_MESSEGE_ERROR);
                $this->redirect('/employee/create');
            }



            if($user->save())
            {


                $userProfile=new UserprofileModel();
                $userProfile->UserId=$user->UserId;
                $userProfile->LastName=$_POST['Lastname'];
                $userProfile->FirstName=$_POST['Firstname'];
                $userProfile->save(false);



                $this->messenger->add('messeg_user_successful',Messenger::APP_MESSEGE_SUCCESS);

            }
            else
                {
                        $this->messenger->add('messeg_user_faildl',Messenger::APP_MESSEGE_ERROR);

                }
            $this->redirect('/employee');




        }



        $this->view();


    }

    function editAction()
    {

        $id=$this->params[0];

        $this->language->load('templet.templet');
        $this->language->load('employee.edit');
        $this->language->load('employee.labels');
        $this->language->load('validate.errors');
        $this->language->load('employee.messeg');
        $this->_data['groups']=UsersgroupModel::getAll();
        $user=EmployeeModel::getByPK($id);
        $this->_data['user']=$user;


        var_dump(  $this->_data['user']);
        if(isset($_POST['submit']) &&  $this->isValid($this->_editActionRoles,$_POST))
        {

            $user->PhoneNumber=$_POST['PhoneNumber'];
            $user->GroupId=$_POST['GroupId'];



            if($user->save())
            {
                $this->messenger->add('messeg_user_successful',Messenger::APP_MESSEGE_SUCCESS);

            }
            else
            {
                $this->messenger->add('messeg_user_faildl',Messenger::APP_MESSEGE_ERROR);

            }
            $this->redirect('/employee');




        }



        $this->view();


    }



    function deleteAction()
    {
        $id=$this->params[0];
        $emp=EmployeeModel::getByPK($id);

            if($emp->delete())
            {
                $this->messenger->add('messeg_user_deleted_successful',Messenger::APP_MESSEGE_SUCCESS);
                $this->redirect("/employee");
            }
            else
            {  $this->messenger->add('messeg_user_deleted_Faild',Messenger::APP_MESSEGE_ERROR);
                $this->redirect("/employee");

            }
        }





public function checkuserexistsajaxAction()
{
    if(isset($_POST['Username']))
    {
header('Content-type:text/plain');
if(EmployeeModel::userExists($_POST['Username'])!==false)
{
    echo "1";

}
else
    {
    echo "2";
    }
}

}






public function checkemailexistsajaxAction()
{
    if(isset($_POST['Email']))
    {
header('Content-type:text/plain');
if(EmployeeModel::emailExists($_POST['Email'])!==false)
{
    echo "1";

}
else
    {
    echo "2";
    }
}

}



}



?>










