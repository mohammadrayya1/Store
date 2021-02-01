<?php

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *
        {
            box-sizing: border-box;
        }
        body
        {
            margin: 0;
            padding: 0;
        }

        .form-content
        {
            margin: 50px auto;

            width: 1000px;
            background-color: coral;


        }

        .form-content form
        {
            overflow: hidden;
            position: relative;
            padding-top: 20px;
        }


        .form-content input
        {
            outline: none;
            width: 80%;
            height: 40px;
            display: block;
            margin: 20px;
            border: none;
            border-radius:5px ;
        }
        .form-content label
        {
            padding: 10px;
            margin: 20px;

        }
        .form-content input[type='submit']
        {

            background-color: darkgreen;
            color: white;
            width: 100px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;


        }
</style>

</head>
<body>


<div class="form-content">
    <p>  <?php if(isset($_SESSION['message']))
        {

            echo  $_SESSION['message'];

            unset($_SESSION['message']);


        }   ?> </p>
       <form method="post" enctype="application/x-www-form-urlencoded">
        <label for="Username">Username</label>
        <input type="text" name="Username" id="Username" value="<?php  if(isset($resupdate))
        {

            echo $resupdate->name;
        } ?>">

        <label for="Password">Password</label>
        <input type="Password" name="Password" id="Password" value="<?php  if(isset($resupdate))
        {

            echo $resupdate->age;
        } ?>">

           <label for="Email">Email</label>
           <input type="text" name="Email" id="Email" value="<?php  if(isset($resupdate))
           {

               echo $resupdate->name;
           } ?>">

           <label for="PhoneNumber">PhoneNumber</label>
           <input type="number" name="PhoneNumber" id="PhoneNumber" value="<?php  if(isset($resupdate))
           {

               echo $resupdate->age;
           } ?>">

           <label for="SubscriptionDate">SubscriptionDate</label>
           <input type="Password" name="SubscriptionDate" id="SubscriptionDate" value="<?php  if(isset($resupdate))
           {

               echo $resupdate->age;
           } ?>">

           <label for="LastLogin">LastLogin</label>
           <input type="text" name="LastLogin" id="LastLogin" value="<?php  if(isset($resupdate))
           {

               echo $resupdate->name;
           } ?>">

           <label for="GroupId">GroupId</label>
           <input type="number" name="GroupId" id="GroupId" value="<?php  if(isset($resupdate))
           {

               echo $resupdate->age;
           } ?>">

           <label for="Status">Status</label>
           <input type="text" name="Status" id="Status" value="<?php  if(isset($resupdate))
           {

               echo $resupdate->age;
           } ?>">

           <input type="submit" name="save" value="save" >



    </form>
</div>
