<?php

class Create_class extends CI_Controller {

    function index() {

        $newRow = array(
            array(
                "class_description" => $this->input->post('classname'),
                "class_location" => $this->input->post('location')
        ));

        $table['table'] = "clases";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->set_Data($newRow, $table,'class_id');

        foreach ($data['result'] as $row) {
            $groupid = $row->class_id;
        }
        
        echo $groupid;
        
    }

}
