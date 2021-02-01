<nav class="main_navigation opened">
    <div class="employee_info">
        <div class="profile_picture">
            <img src="/img/user.png" alt="User Profile Picture">
        </div>
        <span class="name"><?= $this->session->u->Username ?></span>
        <span class="privilege"><?= $this->session->u->GroupName?></span>
    </div>
    <ul class="app_navigation">

        <li class="<?= $this->matchurl('/')===true ? 'selected' : ''?>"><a href="/"><i class="fa fa-dashboard"></i> <?=$text_general_static?></a></li>



        <li class="submenu">
            <a href="javascript:;"><i class="fa fa-credit-card"></i> <?= $text_transaction ?></a>
            <ul>
                <li><a href="/purchases"><i class="fa fa-gift"></i> <?= $text_transaction_purchases ?></a></li>
                <li><a href="/sales"><i class="fa fa-shopping-bag"></i> <?= $text_trancaction_sales ?></a></li>
            </ul>
        </li>




        <li class="submenu">
            <a href="javascript:;"><i class="fa fa-money"></i> <?= $text_expenses?></a>
            <ul>
                <li><a href="/expensescategories"><i class="fa fa-list-ul"></i> <?= $text_expenses_categories ?></a></li>
                <li><a href="/dailyexpenses"><i class="fa fa-dollar"></i> <?=$text_expenses_daily_expenses ?></a></li>
            </ul>
        </li>







        <li class="submenu">
            <a href="javascript:;"><i class="material-icons">store</i> <?= $text_store?></a>
            <ul>
                <li><a href="/productscategories"><i class="fa fa-archive"></i> <?= $text_store_categories?></a></li>
                <li><a href="/products"><i class="fa fa-tag"></i> <?= $text_store_products ?></a></li>
            </ul>
        </li>


        <li><a href="/clients"><i class="material-icons">contacts</i> <?= $text_clients?></a>
        <li><a href="/supplieres"><i class="material-icons">group</i> <?= $text_supplieres?></a></li>

        <li class="submenu <?= $this->matchurl('/employee')===true ? 'selected' : ''?>">
            <a href="javascript:;"><i class="fa fa-user"></i> <?= $text_general_employee ?></a>
            <ul>
                <li><a href="/employee"><i class="fa fa-user-circle selected"></i> <?= $text_users_list ?></a></li>
                <li><a href="/UsersGroup"><i class="fa fa-group"></i> <?= $text_users_groups ?></a></li>
                <li><a href="/privilig"><i class="fa fa-key"></i> <?= $text_users_privileges ?></a></li>
            </ul>
        </li>

<!--
        <li><a href="/categories"><i class="material-icons"></i> <?= $text_store_categories?></a></li>
        <li><a href="/transaction_purchases"><i class="fa fa-users"></i> <?= $text_transaction_purchases?></a></li>
        <li><a href="/expenses_categories"><i class="fa fa-users"></i> <?= $text_expenses_categories?></a></li>
        <li><a href="/expenses_daily_expenses"><i class="fa fa-users"></i> <?= $text_expenses_daily_expenses?></a></li>

-->
        <li><a href="/trancaction_sales"><i class="fa fa-users"></i> <?= $text_trancaction_sales?></a></li>
        <li><a href="/reports"><i class="fa fa-bar-chart"></i> <?= $text_reports?></a></li>
        <li><a href="/notifications"><i class="fa fa-bell"></i> <?= $text_notifications?></a></li>





        <li><a href="/language"><i class="fa fa-users"></i> <?= $text_languag?></a></li>
        <li><a href=""><i class="fa fa-sign-out"></i><?= $text_logout?></a></li>
    </ul>
</nav>
<div class="action_view collapsed">
    <?php
    $messeges=$this->messenger->getmesseges();
    if(!empty($messeges))
    {
        foreach ($messeges as $message)
        {
            ?>
            <p class="message t<?=$message[1] ?>"><?= $message[0]?></p>
            <?php
        }
    }

    ?>
