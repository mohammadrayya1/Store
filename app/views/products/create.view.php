<form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?= $text_legend ?></legend>
        <div class="input_wrapper n50 border">
            <label<?= $this->labelFloat('Name') ?>><?= $text_label_Name ?></label>
            <input required type="text" name="Name" maxlength="40" value="<?= $this->showValue('Name') ?>">
        </div>

        <div class="input_wrapper_other padding n50 select">
            <select required name="CategoryId">
                <option value=""><?= $text_table_Categoryname ?></option>
                <?php if (false !== $productscategories): foreach ($productscategories as $productscategories): ?>
                    <option value="<?= $productscategories->CategoryId ?>"><?= $productscategories->Name ?></option>
                <?php endforeach;endif; ?>
            </select>
        </div>




        <div class="input_wrapper n50 border">
            <label<?= $this->labelFloat('Price') ?>><?= $text_table_Price?></label>
            <input required type="text" name="Price" maxlength="40" value="<?= $this->showValue('Price') ?>">
        </div>
        <div class="input_wrapper n50 border">
            <label<?= $this->labelFloat('Unit') ?>><?= $text_table_Unit?></label>
            <input required type="text" name="Unit" maxlength="40" value="<?= $this->showValue('Unit') ?>">
        </div>

        <div class="input_wrapper n50 border">
            <label<?= $this->labelFloat('Ouantity') ?>><?= $text_new_Ouantity?></label>
            <input required type="text" name="Ouantity" maxlength="40" value="<?= $this->showValue('Ouantity') ?>">
        </div>





        <div class="input_wrapper n50 padding">
            <label class="floated" ><?= $text_label_Image ?></label>
            <input type="file" accept="image/*" name="Image" maxlength="40" value="<?= $this->showValue('Image') ?>">
        </div>


        <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>