<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><?= $text_legend ?></legend>

        <div class="input_wrapper n20 padding border">
            <label <?= $this->labelfloat('Firstname') ?> ><?= $text_label_firstname ?></label>
            <input required type="text" name="Firstname" maxlength="30" value="<?= $this->showValue('Firstname')?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label <?= $this->labelfloat('Lastname') ?> ><?= $text_label_lastname ?></label>
            <input required type="text" name="Lastname" maxlength="30" value="<?= $this->showValue('Lastname')?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label <?= $this->labelfloat('Username') ?> ><?= $text_label_Username ?></label>
            <input required type="text" name="Username" maxlength="30" value="<?= $this->showValue('Username')?>">
        </div>
        <div class="input_wrapper n20 border padding">
            <label <?= $this->labelfloat('Password') ?>><?= $text_label_Password ?></label>
            <input required type="password" name="Password" value="<?= $this->showValue('Password')?>">
        </div>
        <div class="input_wrapper n20 padding">
            <label <?= $this->labelfloat('CPassword') ?>><?= $text_label_CPassword ?></label>
            <input required type="password" name="CPassword" value="<?= $this->showValue('CPassword')?>">
        </div>
        <div class="input_wrapper n30 border">
            <label <?= $this->labelfloat('Email') ?>><?= $text_label_Email ?></label>
            <input required type="email" name="Email" maxlength="40" value="<?= $this->showValue('Email')?>">
        </div>
        <div class="input_wrapper n30 border padding">
            <label <?= $this->labelfloat('CEmail') ?>><?= $text_label_CEmail ?></label>
            <input required type="email" name="CEmail" maxlength="40" value="<?= $this->showValue('CEmail')?>">
        </div>
        <div class="input_wrapper n20 padding border">
            <label <?= $this->labelfloat('PhoneNumber') ?>><?= $text_label_PhoneNumber ?></label>
            <input required type="text" name="PhoneNumber" value="<?= $this->showValue('PhoneNumber')?>">
        </div>
        <div class="input_wrapper_other padding n20 select">
            <select required name="GroupId">
                <option value=""><?= $text_user_GroupId ?></option>
                <?php if (false !== $groups): foreach ($groups as $group): ?>
                    <option value="<?= $group->GroupId ?>"><?= $group->GroupName ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>
        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>