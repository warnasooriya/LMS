<?php

class Register extends CI_Controller {

    public function index() {


        $usertype = $this->input->post('usertype');
        if ($usertype == "Student") {
            $usertype = 3;
        } else {
            $usertype = 2;
        }



        $Row = array(
            array(
                "user_name" => $this->input->post('email'),
                "user_type" => $usertype,
                "password" => md5($this->input->post('pass')),
                "login_status" => '0'
            )
        );

        $table['table'] = "users";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->set_Data_Register($Row, $table);

        foreach ($data['result'] as $row) {
            $userid = $row->user_id;
        }



        $isUpload = false;
        try {

            if (isset($_FILES['photo'])) {
                $fimagename = $this->Upload_image("photo", $userid);
            }

            $isUpload = true;
        } catch (Exception $e) {
            $isUpload = FALSE;
        }





        if ($usertype == 3) {
            $table['table'] = "students";
            $id['id'] = "student_id";
            $newRow = array(
                array(
                    "student_name" => $this->input->post('name'),
                    "user_id" => $userid,
                    "student_email" => $this->input->post('email'),
                    "student_contact_no" => $this->input->post('contactno'),
                    "student_photo" => $fimagename,
                    "student_address" => $this->input->post('address'),
                    "about_student" => $this->input->post('info'),
                    "class_id" => $this->input->post('classid')
                )
            );
        } else {
            $table['table'] = "teachers";
            $id['id'] = "teacher_id";
            $newRow = array(
                array(
                    "teacher_name" => $this->input->post('name'),
                    "teacher_email" => $this->input->post('email'),
                    "teacher_address" => $this->input->post('address'),
                    "teacher_contact_no" => $this->input->post('contactno'),
                    "teacher_assigned_class" => '',
                    "teacher_info" => $this->input->post('info'),
                    "teacher_photo" => $fimagename,
                    "user_id" => $userid
                )
            );
        }


        $this->load->model('get_db');
        $data['result'] = $this->get_db->set_Data_Register($newRow, $table);


        $RowU = array(
            array(
                "user_id" => $userid,
                "user_name" => $this->input->post('email'),
                "user_type" => $usertype,
                "password" => md5($this->input->post('pass')),
                "login_status" => '0',
                "photo" => $fimagename
            )
        );

        
        $table['table'] = "users";

        $this->load->model('get_db');
        $data['result'] = $this->get_db->Update_User($RowU, $table);




        require_once 'pages.php';
        $pages = new Pages;
        $pages->register_success('Registerd  Successfully Please Wait Untill Accept by Admin !');
    }

    function Upload_image($file, $vehicleNo) {
        try {
            $filename = $_FILES[$file]["name"];
            $extension = end(explode(".", $filename));
            $newfilename = $vehicleNo . "." . $extension;

            if ((($_FILES[$file]["type"] == "image/gif") || ($_FILES[$file]["type"] == "image/jpeg") || ($_FILES[$file]["type"] == "image/jpg") || ($_FILES[$file]["type"] == "image/png") || ($_FILES[$file]["type"] == "image/pjpeg")) && ($_FILES[$file]["size"] < 20 * 1024 * 1024)) {

                if ($_FILES[$file]["error"] > 0) {
                    echo "Return Code: " . $_FILES[$file]["error"] . $_FILES[$file]["size"] . "<br />";
                } else {
//        echo "Upload: " . $_FILES[$file]["name"] . "<br />";
//        echo "Type: " . $_FILES[$file]["type"] . "<br />";
//        echo "Size: " . ($_FILES[$file]["size"] / 1024) . " Kb<br />";
//        echo "Temp file: " . $_FILES[$file]["tmp_name"] . "<br />";

                    if (file_exists("userimages/" . $_FILES[$file]["name"])) {
                        echo $_FILES[$file]["name"] . " already exists. ";
                    } else {
                        $moveResult = move_uploaded_file($_FILES[$file]["tmp_name"], "userimages/" . $newfilename);
                        if ($moveResult == true) {
                            // move_uploaded_file(base_url()."vehicleImg/'.$filename, "vehicleImg/" . $newfilename);
//          echo "Stored in: " . "vehicleImg/" .$newfilename;
                            return $newfilename;
                            echo 'image uploaded...';
                        } else {
                            echo 'Error in Movement';
                        }
                    }
                }
            } else {
                //echo "Invalid file, File must be less than 100Kb in size with .jpg, .jpeg, or .gif file extension";
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

}

?>