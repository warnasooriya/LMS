
<ul class="menu">
    <?php
    $this->method_call = & get_instance();
    $data = $this->method_call->Get_unreaded_messages();
    foreach ($data['result'] as $newrow) {

    ?>
    <li><!-- start message -->
        <a href="#" onclick="Update_Message_read_status(this.id,'1')" id="<?php echo $newrow->messages_id ?>">
            <div class="pull-left">
                <img src="<?php echo 'userimages/'.$newrow->photo; ?>" class="img-circle" alt="User Image">
            </div>
            <h4>
                <?php echo $newrow->fromUser_Name ?>
                <small><i class="fa fa-clock-o"></i> <?php echo $newrow->createdatetime; ?></small>
            </h4>
            <p><?php echo $newrow->subject ?></p>
        </a>
    </li><!-- end message -->
    
    <?php } ?>
    
</ul>