<?php

class Create_group extends CI_Controller {

    function index() {

        $newRow = array(
            array(
                "group_title" => $this->input->post('mgroup')
        ));

        $table['table'] = "message_groups";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->set_Data($newRow, $table,'group_id');

        foreach ($data['result'] as $row) {
            $groupid = $row->group_id;
        }
        
        echo $groupid;
        
    }

}
