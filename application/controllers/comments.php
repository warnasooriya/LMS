<?php

class Comments extends CI_Controller {

    function index() {
        $newRow = array(
            array(
                "article_id" => $this->input->post('id'),
                "commenter_name" => $this->input->post('name'),
                "commenter_email" => $this->input->post('email'),
                "comment" => $this->input->post('comment'),
                "status" => '0'
        ));

        $table['table'] = "comments_on_articles";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->set_Data($newRow, $table, 'comments_id');

        foreach ($data['result'] as $row) {
            $groupid = $row->comments_id;
        }

        echo $groupid;
    }

}
