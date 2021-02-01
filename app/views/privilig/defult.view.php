<h1><?= $title?></h1>

<a class="button" href="/privilig/create"><i class="fa fa-plus"></i> <?= $text_new_item?></a>
<table class="data">
    <thead>
    <tr>
        <th><?= $text_table_priviligname?></th>

        <th><?= $text_table_controll?></th>


    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $privilig) {
        foreach ($privilig as $privilig) {
            ?>
            <tr>

                <td><?=$privilig->	PriviligTitle?></td>

                <td class="links" style="width: 200px">
                    <a href="/privilig/edit/<?php echo $privilig->PrivilegeId  ?> "><button class=danger>UPDATE</button></a>
                    <a href="/privilig/delete/<?php echo $privilig->PrivilegeId   ?>" ><button class="update" onclick="javascript:if(!confirm('Are you sure you want to delete this comment?'))return false;">DELETE</button></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>