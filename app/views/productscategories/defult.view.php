<div class="container">
<?= UPLOAD_STORAGE?>
    <a href="/productscategories/create" class="button"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_table_Name ?></th>
                <th><?= $text_table_Image ?></th>
                <th><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
        <?php if(false !== $productscategories): foreach ($productscategories as $productscategories): ?>
            <tr>
                <td><?= $productscategories->Name ?></td>
                <td> <img src="upload/image/<?=$productscategories->Image?>" width="200px"></td>

                <td>
                    <a href="/productscategories/edit/<?= $productscategories->CategoryId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/productscategories/delete/<?= $productscategories->CategoryId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>