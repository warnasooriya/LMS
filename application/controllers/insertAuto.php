<?php

class InsertAuto extends CI_Controller {

    public function insert($tablename,$value)
    {
        $value = str_replace("%20", " ",$value);
        $value=str_replace("'", "_", $value);
     
        $newRow = array(
            array(
                $tablename => $value
            )
        );
        

        $this->load->model('get_db');
        echo $tablename.'<br>';
        echo $value;
        $table['table'] = $tablename;
        $data['result']=$this->get_db->Set_Data_Auto($newRow, $table);
      echo $data['result'];
    }

}

?>
