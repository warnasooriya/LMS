<?php

class Autocomplete extends CI_Controller {

    public function AC_Data($tablename,$field) {

        $this->load->model('get_db');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            
            echo $this->get_db->Auto_Complete_all($q,$tablename,$field);
        }
    }
    
    
    
    
     

}

?>
        