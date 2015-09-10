<?php

class Save_article extends CI_Controller {

    function Save() {

        $imageName = "";
        $videoname = "";

        try {
            $userid = $this->get_Current_user_id();
            $newRow = array(
                array(
                    "article_title" => $this->input->post('title'),
                    "description" => $this->input->post('description'),
                    "article_type" => $this->input->post('articleType'),
                    "published_user" => $userid,
                    "event_date" => $this->input->post('eventdate'),
                    "eventtime" => $this->input->post('eventtime')
            ));

            $table['table'] = "article";
            $this->load->model('get_db');
            $fk = "article_id";
            $data['result'] = $this->get_db->set_Data($newRow, $table, $fk);

            foreach ($data['result'] as $row) {
                $articleId = $row->article_id;
            }




            if (isset($_FILES['img'])) {
                $fname = "";
                $uploaddir = 'articles/';
                $newname = basename($_FILES['img']['name']);

                $temp = explode(".", $_FILES["img"]["name"]);
                $newname = round(microtime(true)) . '.' . end($temp);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], "articles/" . $newname)) {
                    $imageName = $newname;

                    $imgRow = array(
                        array(
                        "article_id" => $articleId,
                        "source" => $imageName,
                        "file_type" => "image"
                    ));

                    $table['table'] = "article_attachement";
                    $this->load->model('get_db');
                    $fk = "article_attachement_id";
                    $data['result'] = $this->get_db->set_Data($imgRow, $table, $fk);
                } else {
                    $imageName = "";
                }
            }


            if (isset($_FILES['video'])) {
                $fname = "";
                $uploaddir = 'articles/';
                $newname = basename($_FILES['video']['name']);

                $temp = explode(".", $_FILES["video"]["name"]);
                $newname = round(microtime(true)) . '.' . end($temp);
                if (move_uploaded_file($_FILES["video"]["tmp_name"], "articles/" . $newname)) {
                    $videoname = $newname;

                    $videoRow = array(array(
                        "article_id" => $articleId,
                        "source" => $videoname,
                        "file_type" => "video"
                    ));


                    $table['table'] = "article_attachement";
                    $this->load->model('get_db');
                    $fk = "article_attachement_id";
                    $data['result'] = $this->get_db->set_Data($videoRow, $table, $fk);
                } else {
                    $videoname = "";
                }
            }

            $msg = "Article was published Successfully !";
            $stst = 1;
        } catch (Exception $x) {
            $msg = "Article was not published Successfully";
            $stst = 0;
        }
        $newdata = array(
            'message' => $msg,
            'stst' => $stst
        );

        $this->session->set_userdata($newdata);

        redirect('main', 'refresh');
    }

    function get_Current_user_id() {

        $session_data = $this->session->all_userdata();
        $username = $session_data['email'];

        if ($username == "") {
            redirect('login', 'location', 301);
            exit();
        }



        $userid = $this->Get_Field_value_Given_Field_Noprint('users', 'user_id', 'user_name', $username);



        return $userid;
    }

    function Get_Field_value_Given_Field_Noprint($tableName, $fieldName, $givenField, $givenFieldValue) {
        $text = "";
        $tempval = str_replace("=", "@", $givenFieldValue);
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_Field($tableName, $fieldName, $givenField, $tempval);
        foreach ($data['result'] as $row) {
            $text = $row->$fieldName;
        }

        return $text;
    }

    function get_Field($tableName, $fieldName, $givenField, $givenFieldValue) {
        $newval = str_replace("%20", " ", $givenFieldValue);
        $query = $this->db->query("select $fieldName  from  $tableName where $givenField='$newval' ");
        return $query->result();
    }

}

?>