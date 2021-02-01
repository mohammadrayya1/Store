<h1><?= $text_header?></h1>

<a class="button" href="/usersgroup/create"><i class="fa fa-plus"></i> <?= $text_new_item?></a>
<table class="data">
    <thead>
    <tr>
        <th><?= $text_table_groupname?></th>
        <th><?= $text_table_controll?></th>


    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $usersgroup) {
        foreach ($usersgroup as $usersgroup) {
            ?>
            <tr>

                <td><?=$usersgroup->GroupName?></td>


                <td class="links" style="width: 200px" >
                    <a href="/usersgroup/edit/<?php echo $usersgroup->GroupId  ?> "><button class=danger>UPDATE</button></a>
                    <a href="/usersgroup/delete/<?php echo $usersgroup->GroupId   ?>" ><button class="update" onclick="javascript:if(!confirm('Are you sure you want to delete this comment?'))return false;">DELETE</button></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>