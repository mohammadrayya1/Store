
<a class="button" href="/employee/create"><i class="fa fa-plus"></i> <?= $text_add_employee?></a>
<table class="data">
    <thead>
    <tr>
        <th><?= $text_table_employee_UserId ?></th>
        <th><?= $text_table_employee_Username ?></th>
        <th><?= $text_table_employee_Password ?></th>
        <th><?= $text_table_employee_Email ?></th>
        <th><?= $text_table_employee_PhoneNumber ?></th>
        <th><?= $text_table_employee_SubscriptionDate?></th>
        <th><?= $text_table_employee_LastLogin ?></th>
        <th><?= $text_table_employee_GroupId ?></th>
        <th><?= $text_table_employee_Status ?></th>
        <th><?= $text_table_employee_active ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(false !== $employee) {
        foreach ($employee as $employee) {
            ?>
            <tr>
                <td><?= $employee->UserId ?></td>
                <td><?=$employee->Username?></td>
                <td><?= $employee->Password ?></td>
                <td><?= $employee->Email ?></td>
                <td><?=$employee->PhoneNumber ?></td>
                <td><?= $employee->SubscriptionDate ?></td>
                <td><?= $employee->LastLogin ?></td>
                <td><?=$employee->GroupName ?></td>
                <td><?= $employee->Status ?></td>
                <td>
                    <a href="/employee/edit/<?php echo $employee->UserId  ?> "><button class=danger>UPDATE</button></a>
                    <a href="/employee/delete/<?php echo $employee->UserId   ?>" ><button class="update" onclick="javascript:if(!confirm('Are you sure you want to delete this comment?'))return false;">DELETE</button></a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>