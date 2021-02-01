<div class="action_view login">
    <?php
    $messeges=$this->messenger->getmesseges();
    if(!empty($messeges))
    {
      ?>
    <p class="message t<?=$messeges[0][1] ?>"><?= $messeges[0][0]?></p>
    <?php

    }


    ?>

    <div class="login_box animate">
        <form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded">
            <div class="border"></div>
            <h1><?= $login_header ?></h1>
            <img src="/img/login-icon.png" width="120">
            <div class="input_wrapper username">
                <input required type="text" name="ucname" id="ucname" maxlength="50" placeholder="<?= $login_ucname ?>">
            </div>
            <div class="input_wrapper password">
                <input required type="password" id="ucpwd" name="ucpwd" maxlength="100" placeholder="<?= $login_ucpwd ?>">
            </div>
            <input type="submit" name="login" value="<?= $login_button ?>">
        </form>
    </div>
</div>