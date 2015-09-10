<div class="col-md-12">
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-6">
        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                <tbody>
                    <?php
                    $this->method_call = & get_instance();
                    $data = $this->method_call->Get_Summery('message_groups');
                    foreach ($data['result'] as $row) {
                        ?>
                        <tr>
                            <td>
                               <?php echo $row->group_title; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>

    </div>
</div>
</div>