<?php
class Remove_data extends CI_Controller
{
    function remove($table,$key,$key_value)
    {
        echo $table . $key . $key_value;
        
        $this->load->model('db_remove_data');
        $data=$this->db_remove_data->delete_table($table,$key,$key_value);
        
        
        
        print_r($data);
    }
}
