<?php

class Get_db extends CI_Model {

    function Auto_Complete($q, $tableandFieldnameSame) {
        $this->db->select('*');
        $this->db->like($tableandFieldnameSame, $q);
        $query = $this->db->get($tableandFieldnameSame);
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['label'] = htmlentities(stripslashes($row[$tableandFieldnameSame]));
                $new_row['value'] = htmlentities(stripslashes(str_replace(" ", "'", $row[$tableandFieldnameSame])));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    
        function Auto_Complete_all($q,$tablename,$fieldname) {
        $this->db->select('*');
        $this->db->like($fieldname, $q);
        $query = $this->db->get($tablename);
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['label'] = htmlentities(stripslashes($row[$fieldname]));
                $new_row['value'] = htmlentities(stripslashes(str_replace(" ", "'", $row[$fieldname])));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }
    
    
    
    
    
    function set_Data_Register($data, $table) {

        $tbl = $table['table'];
        //$this->db->query("LOCK TABLES vehicle_valuation WRITE");
        $this->db->insert_batch($tbl, $data);
        $query = $this->db->query("select  *  from " . $tbl . " where user_id = (select max(user_id) from " . $tbl . ")");
        //$this->db->query("UNLOCK TABLES");
        return $query->result();
    }

    function set_Data_Messages($data, $table) {
        $tbl = $table['table'];
        //$this->db->query("LOCK TABLES vehicle_valuation WRITE");
        $this->db->insert_batch($tbl, $data);
        $query = $this->db->query("select  *  from " . $tbl . " where messages_id = (select max(messages_id) from " . $tbl . ")");
        //$this->db->query("UNLOCK TABLES");
        return $query->result();
    }

  
    
    
    
    
        function set_Data($data, $table,$fk_auto_increment) {
        $tbl = $table['table'];
        //$this->db->query("LOCK TABLES vehicle_valuation WRITE");
        $this->db->insert_batch($tbl, $data);
        $query = $this->db->query("select  *  from " . $tbl . " where $fk_auto_increment = (select max($fk_auto_increment) from " . $tbl . ")");
        //$this->db->query("UNLOCK TABLES");
        return $query->result();
    }
    
    
    function Update_User($data, $table) {
        $tbl = $table['table'];
        $this->db->update_batch($tbl, $data, 'user_id');
    }
    
     function Update_table($data, $table,$fk) {
        $tbl = $table['table'];
        $this->db->update_batch($tbl, $data, $fk);
    }

    function Set_Data_Auto($data, $table) {
        $tbl = $table['table'];
        $data['result'] = $this->db->insert_batch($tbl, $data);
        return $data;
    }

    function get_Data($recno) {
        $query = $this->db->get_where('vehicle_valuation', array('no' => $recno));
        return $query->result();
    }

    function get_Data_bike($recno) {
        $query = $this->db->get_where('bike_evaluation', array('no' => $recno));
        return $query->result();
    }

    function count_table($tableName) {
        $query = $this->db->query("select count(*) as count from " . $tableName . " ");
        return $query->result();
    }

    function Summery($table) {
        $query = $this->db->query("select *  from " . $table . " ");
        return $query->result();
    }

    function log($username, $pass) {
        $query = $this->db->query("select *  from user where email=" . $username . " AND password=" . $pass . "  ");
        return $query->result();
    }

    function get_last_No($tableName, $field) {
        $query = $this->db->query("select max($field) as maxno from " . $tableName . " ");
        return $query->result();
    }

    function get_Unreaded_message_count($userid) {
        $query = $this->db->query("select  count(*) as unreaded from my_unreaded_messages where to_user=$userid or user_id=$userid");
        return $query->result();
    }

    function execute_query($sql) {
        $query = $this->db->query($sql);
        return $query->result();
    }

    function execute_Nquery($sql) {
        $query = $this->db->query($sql);
    }

    function get_Field($tableName, $fieldName, $givenField, $givenFieldValue) {
        $newval = str_replace("%20", " ", $givenFieldValue);
        $query = $this->db->query("select $fieldName  from  $tableName where $givenField='$newval' ");
        return $query->result();
    }

    function get_filter_data($tablename, $whereField, $whereValue) {
        // $this->db->where($whereField,$whereValue);
        $this->db->like($whereField, $whereValue);
        $query = $this->db->get($tablename);
        return $query->result();
    }

}

?>
