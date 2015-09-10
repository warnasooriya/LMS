<?php

class Update_profile extends CI_Controller {

    public function index() {


        $usertype = $this->input->post('usertype');
        $userid = $this->input->post('uid');
        $stTeacherId = $this->input->post('stteacherid');

        $isUpload = false;


        if (isset($_FILES['photo'])) {
            $fimagename = $this->Upload_image("photo");
        }
        if ($fimagename == "") {
            $fimagename = $this->input->post('user_img');
        }



        if ($usertype == 3) {
            $table['table'] = "students";
            $id = "student_id";
            $newRow = array(
                array(
                    "student_id" => $stTeacherId,
                    "class_id" => $this->input->post('class'),
                    "student_name" => $this->input->post('name'),
                    "student_email" => $this->input->post('email'),
                    "student_contact_no" => $this->input->post('contactno'),
                    "student_photo" => $fimagename,
                    "student_address" => $this->input->post('address'),
                    "about_student" => $this->input->post('info')
                )
            );
        } else {
            $table['table'] = "teachers";
            $id = "teacher_id";
            $newRow = array(
                array(
                    "teacher_id" => $stTeacherId,
                    "teacher_name" => $this->input->post('name'),
                    "teacher_email" => $this->input->post('email'),
                    "teacher_address" => $this->input->post('address'),
                    "teacher_contact_no" => $this->input->post('contactno'),
                    "teacher_assigned_class" => '',
                    "teacher_info" => $this->input->post('info'),
                    "teacher_photo" => $fimagename
                )
            );
        }


        $this->load->model('get_db');
        $data['result'] = $this->get_db->Update_table($newRow, $table, $id);


        $RowU = array(
            array(
                "user_id" => $userid,
                "photo" => $fimagename
            )
        );


        $table['table'] = "users";
        $id = "user_id";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->Update_table($RowU, $table, $id);



        $newdata = array(
            'message' => 'Profile Updated  Successfully !',
            'stst'=>'1'
            
        );

        $this->session->set_userdata($newdata);

        redirect('main', 'refresh');

        
    }

    function Upload_image($file) {
        try {

            if ((($_FILES[$file]["type"] == "image/gif") || ($_FILES[$file]["type"] == "image/jpeg") || ($_FILES[$file]["type"] == "image/jpg") || ($_FILES[$file]["type"] == "image/png") || ($_FILES[$file]["type"] == "image/pjpeg")) && ($_FILES[$file]["size"] < 20 * 1024 * 1024)) {

                if ($_FILES[$file]["error"] > 0) {
                    echo "Return Code: " . $_FILES[$file]["error"] . $_FILES[$file]["size"] . "<br />";
                } else {

                    $newname = basename($_FILES[$file]['name']);

                    $temp = explode(".", $_FILES[$file]["name"]);
                    $newname = round(microtime(true)) . '.' . end($temp);

                    $moveResult = move_uploaded_file($_FILES[$file]["tmp_name"], "userimages/" . $newname);
                    if ($moveResult == true) {
                        // move_uploaded_file(base_url()."vehicleImg/'.$filename, "vehicleImg/" . $newfilename);
//          echo "Stored in: " . "vehicleImg/" .$newfilename;
                        return $newname;
                        echo 'image uploaded...';
                    } else {
                        
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