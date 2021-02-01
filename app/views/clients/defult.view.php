<h1><?= $title?></h1>

<a class="button" href="/clients/add"><i class="fa fa-plus"></i> <?= $text_add_clients?></a>
<table class="data">
    <thead>
    <tr>
        <th><?= $text_table_clients_Username ?></th>
        <th><?= $text_table_group?></th>
        <th><?= $text_table_clients_Email ?></th>
        <th><?= $text_table_subscribe?></th>
        <th><?= $text_table_last_login?></th>
        <th><?= $text_table_controll?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $clients) {
        foreach ($clients as $clients) {
            ?>
            <tr>

                <td><?=$clients->Username?></td>
                <td><?=$clients->GroupId?></td>
                <td><?= $clients->Email ?></td>
                <td><?= $clients->SubscriptionDate ?></td>
                <td><?= $clients-> LastLogin ?></td>


                <td>
                    <a href="/employee/edit/<?php echo $clients->UserId  ?> "><button class=danger>UPDATE</button></a>
                    <a href="/employee/delete/<?php echo $clients->UserId   ?>" ><button class="update" onclick="javascript:if(!confirm('Are you sure you want to delete this comment?'))return false;">DELETE</button></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>