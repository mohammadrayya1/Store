<div class="container">

    <a href="/products/create" class="button"><i class="fa fa-plus"></i> <?= $text_new_item ?></a>
    <table class="data">
        <thead>
            <tr>
                <th><?= $text_table_Categoryname ?></th>
                <th><?= $text_table_Name ?></th>
                <th><?= $text_new_Ouantity ?></th>
                <th><?= $text_table_Price ?></th>
                <th><?= $text_table_Unit ?></th>
                <th><?= $text_table_Image ?></th>
                <th><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>


        <?php if(false !== $products): foreach ($products as $products): ?>
            <tr>


                <td><?= $products->Categoryname ?></td>
                <td><?= $products->Name ?></td>
                <td><?= $products->Ouantity ?></td>
                <td><?= $products->Price ?></td>
                <td><?= $products->Unit ?></td>

                <td> <img src="upload/image/<?=$products->Image?>" width="200px"></td>

                <td>
                    <a href="/products/edit/<?=$products->CategoryId ?>"><i class="fa fa-edit"></i></a>
                    <a href="/products/delete/<?= $products->CategoryId ?>" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>