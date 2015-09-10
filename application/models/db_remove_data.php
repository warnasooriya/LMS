<?php

class Db_remove_data extends CI_Model {

    function delete_table($table,$key,$keyvalue) {
        
        $this->db->where($key, $keyvalue);
        $data['result']=$this->db->delete($table);
        return $data;
    }

}
