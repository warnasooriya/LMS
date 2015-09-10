<?php
class Contactus extends CI_Controller
{
    function index()
    {
         $newRow = array(
            array(
                "name" => $this->input->post('name'),
                "email" => $this->input->post('email'),
                 "subject" => $this->input->post('subject'),
                "message" => $this->input->post('message')
        ));

        $table['table'] = "contact_us";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->set_Data($newRow, $table,'id');

        foreach ($data['result'] as $row) {
            $groupid = $row->id;
        }
        
        echo $groupid;
        redirect('front');
    }
}