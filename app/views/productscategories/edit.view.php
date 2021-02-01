<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n100 border">
            <label<?= $this->labelFloat('Name',$productscategories) ?>><?= $text_label_Name ?></label>
            <input required type="text" name="Name" maxlength="40" value="<?= $this->showValue('Name',$productscategories) ?>">
        </div>

        <div class="input_wrapper n50 padding">
            <label class="floated" ><?= $text_label_Image ?></label>
            <input type="file" accept="image/*" name="Image" maxlength="40" value="<?= $this->showValue('Image') ?>">
        </div>

        <div class="input_wrapper n100 border">
       <img src="/upload/image/<?=$productscategories->Image?>" width="200px">
        </div>

        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>