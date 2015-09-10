<table class="table table-hover table-striped">
    <tbody>
        <?php
        $this->method_call = & get_instance();
        $data1 = $this->method_call->Get_Summery('qry_user_details');
        foreach ($data1['result'] as $newrow) {
            ?>
            <tr>
                <td><input type="checkbox" id="<?php echo $newrow->user_id ?>" onchange="Update_User_Group(this.id)" value=""          <?php
                    $this->method_call = & get_instance();
                    $dd = $this->method_call->Get_Grouped_Users($newrow->user_id, $grpid);
                    if ($dd == true) {
                        echo 'checked';
                    }
                    ?>></td>
                <td> <?php if($newrow->account_status==1){ ?><i class="fa fa-circle text-green"></i> <?php } else {
                    ?>
                    <i class="fa fa-circle text-red"></i>
                    <?php
                }?></td>
                <td><img src="<?php echo 'userimages/' . $newrow->photo; ?>" class="img-circle" width="50px"> <?php echo $newrow->Description ?> </td>
                
                <td class="mailbox-name"><a href="#"  > <?php echo $newrow->name; ?></a></td>
                <td class="mailbox-subject"><b><?php echo $newrow->user_name ?></b> </td>
                <td class="mailbox-attachment"> </td>
                <td class="mailbox-date"><?php echo $newrow->contact_no; ?></td>
            </tr>
            <?php
        }
        ?>




    </tbody>
</table>