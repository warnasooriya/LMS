<?php

class Pages extends CI_Controller {

    function view() {
        $data['title'] = ':: Login ::';
        $data['image'] = 'icon.png';
        $this->load->view('login', $data);
    }

    function main() {
        $this->load->view('index');
    }

    function front() {
        $this->load->view('front_header');
        $this->load->view('front_index');
        $this->load->view('front_footer');
    }

    function article_details($articleid) {
        $aid = $articleid;
        $data['id'] = $aid;
        $this->load->view('front_header_details');
        $this->load->view('detail_article', $data);
        $this->load->view('front_footer_details');
    }

    function gallery() {
        $this->load->view('front_header');
        $this->load->view('gallery');
        $this->load->view('front_footer');
    }

    function about() {
        $this->load->view('front_header');
        $this->load->view('about');
        $this->load->view('front_footer');
    }

    function contact() {
        $this->load->view('front_header');
        $this->load->view('contact');
        $this->load->view('front_footer');
    }

    function events() {
        $this->load->view('front_header');
        $this->load->view('allevents');
        $this->load->view('front_footer');
    }

    function student_register() {
        $data['title'] = ':: Register ::';
        $data['image'] = 'icon.png';
        $this->load->view('studentregister', $data);
    }

    function teacher_register() {
        $data['title'] = ':: Register ::';
        $data['image'] = 'icon.png';
        $this->load->view('teacherRegister', $data);
    }

    function register_user() {
        $data['title'] = ':: Register ::';
        $data['image'] = 'icon.png';
        $this->load->view('register', $data);
    }

    function register_success($msg) {

        $data['title'] = ':: Register Dialog ::';
        $data['image'] = 'icon.png';
        $no['msg'] = $msg;
        $this->load->view('register_Success', $no);
    }

    function messages() {
        $this->load->view('messages');
    }

    function profile() {
        $this->load->view('profilechange');
    }

    function profile_details() {
        $this->load->view('update_profile_details');
    }

    function classes_details() {
        $this->load->view('classes_details');
    }

    function upload_article() {

        $this->load->view('articles_upload');
    }

    function create_class() {
        $this->load->view('create_classes');
    }

    function sentMessages() {
        $this->load->view('sentmessages');
    }

    function messagebar() {
        $this->load->view('messagebar');
    }

    function compose() {
        $this->load->view('compose');
    }

    function nmessage_groups() {
        $this->load->view('groups_details');
    }

    function change_user_type() {
        $this->load->view('create_new_admin');
    }

    function readmail($messageid, $inbox) {
        $no['msgid'] = $messageid;
        $no['ib'] = $inbox;
        $this->load->view('read_messages', $no);
    }

    function Load_message_group_users($gid) {
        $no['grpid'] = $gid;
        $this->load->view('message_group_user_details', $no);
    }

    function usermanage() {
        $this->load->view('manage_users');
    }

    function articlemnabage() {
        $this->load->view('article_manage');
    }

    function commentmanage() {
        $this->load->view('comment_manage');
    }

    function article_det_for_admin($aid) {
        $no['id'] = $aid;
        $this->load->view('article_details_for_admin_accept', $no);
    }

    function upload() {
        $this->load->view('upload');
    }

    function login() {
        $this->load->view('login');
    }

    function vehicleEvaluation() {

        $data['image'] = 'icon.png';
        $data['title'] = ':: Vehicle Valuation ::';
        $this->load->view('header', $data);
        $this->load->view('vehicleEvaluation');
        $this->load->view('footer');
    }

    function bike() {

        $data['image'] = 'icon.png';
        $data['title'] = ':: Bike Valuation ::';
        $this->load->view('header', $data);
        $this->load->view('bike');
        $this->load->view('footer');
    }

    function count_unreaded_messages() {

        $session_data = $this->session->all_userdata();
        $username = $session_data['email'];

        if ($username == "") {
            redirect('login', 'location', 301);
            exit();
        }

        $userid = $this->Get_Field_value_Given_Field_Noprint('users', 'user_id', 'user_name', $username);

        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_Unreaded_message_count($userid);
        foreach ($data['result'] as $row) {
            $msgcount = $row->unreaded;
        }
        echo $msgcount;
        return $msgcount;
    }

    function Get_unreaded_messages() {

        $session_data = $this->session->all_userdata();
        $username = $session_data['email'];
        $userid = $this->Get_Field_value_Given_Field_Noprint('users', 'user_id', 'user_name', $username);
        $data = $this->Get_Unreader_Messages_with_groups($userid);
        return $data;
    }

    function Max_no($tableName, $field) {
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_last_No($tableName, $field);
        foreach ($data['result'] as $row) {
            $lastNo = $row->maxno;
        }
        return $lastNo;
    }

    function Get_Field_value_Given_Field($tableName, $fieldName, $givenField, $givenFieldValue) {
        $text = "";
        $tempval = str_replace("=", "@", $givenFieldValue);
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_Field($tableName, $fieldName, $givenField, $tempval);
        foreach ($data['result'] as $row) {
            $text = $row->$fieldName;
        }
        echo $text;
        return $text;
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

    function Get_Field_value_Given_Field_post($tableName, $fieldName, $givenField, $fvalue) {
        $value = $this->input->post($fvalue);
        $text = "";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_Field($tableName, $fieldName, $givenField, $value);
        foreach ($data['result'] as $row) {
            $text = $row->$fieldName;
        }
        echo $text;
        return $text;
    }

    function Get_Field_value_Given_Field_for_photoLoad($tableName, $fieldName, $givenField, $givenFieldValue) {
        $text = "";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_Field($tableName, $fieldName, $givenField, $givenFieldValue);
        foreach ($data['result'] as $row) {
            $text = $row->$fieldName;
        }
        return $text;
    }

    function Edit_Vehicle_Valuation($no) {

        $this->load->model('get_db');
        $query = $this->db->get_where('vehicle_valuation', array('no' => $no));
        $data['result'] = $query->result();
        return $data;
    }

    function Get_ResultSet($fkey, $fkeyvalue, $table) {
        $this->load->model('get_db');
        $query = $this->db->get_where($table, array($fkey => $fkeyvalue));
        $data['result'] = $query->result();
        return $data;
    }

    function Get_Messages_with_groups($userid) {

        $sql = "select * from my_messages where to_user=$userid or user_id=$userid group by messages_id";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->execute_query($sql);
        return $data;
    }

    function Execute($sql) {
        $this->load->model('get_db');
        $data['result'] = $this->get_db->execute_query($sql);
        return $data;
    }

    function Get_Unreader_Messages_with_groups($userid) {

        $sql = "select * from my_unreaded_messages where to_user=$userid or user_id=$userid group by messages_id";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->execute_query($sql);
        return $data;
    }

    function count_Bike_Registration() {
        $this->load->model('get_db');
        $data['result'] = $this->get_db->count_table('bike_evaluation');
        foreach ($data['result'] as $row) {
            $count_vehicle_Registration = $row->count;
        }
        return $count_vehicle_Registration;
    }

    function Get_Summery($table) {
        $this->load->model('get_db');
        $data['result'] = $this->get_db->Summery($table);
        return $data;
    }

    function Get_Grouped_Users($userid, $groupid) {
        $sql = "select * from message_group_members where group_id=$groupid and user_id=$userid";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->execute_query($sql);
        $x = false;
        foreach ($data['result'] as $row) {
            $x = true;
        }

        return $x;
    }


    function Update_Account_Status($userid, $stat) {



        $sql1 = "select * from users where user_id=$userid";
        $this->load->model('get_db');
        $data['result'] = $this->get_db->execute_query($sql1);
        foreach ($data['result'] as $row) {
            $uersname = $row->user_name;
        }
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('schoolsystem@zonocloud.com', 'Zono School System Status Update');
        $this->email->to($uersname);
        $this->email->subject('Account Status Update');
        if ($stat == 1) {
            $msg = "<h2>Welcome to ZonoCloud LMS!</h2><hr><br><p>" . "You are now approved to Login  ZonoCloud LMS !" . "<a href='http://lms.zonocloud.com/login'>Click here</a> to log in!
                        Thank you for trying out ZonoCloud LMS! </p>";
        } else {
            $msg = "<h2>Warning  about Blocked ZonoCloud LMS Account </h2><br><p>" . "Your ZonoCloud LMS Account has Blocked by Administrator Please Contact the Administrator</p>";
        }
        $this->email->message($msg);
        $this->email->send();


        $sql = "UPDATE users set account_status=$stat where user_id=$userid ";
        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);



        // return $data;
    }

    function Update_User_Types($userid, $type) {

        $sql = "UPDATE users set user_type=$type where user_id=$userid ";
        $this->load->model('get_db');
        $this->get_db->execute_query($sql);
        // return $data;
    }

    function Update_Article_Status($articleId, $stat) {

        $sql = "UPDATE article set status=$stat where article_id=$articleId ";
        $this->load->model('get_db');
        $this->get_db->execute_query($sql);
        // return $data;
    }

    function Update_Comment_Status($commentId, $stat) {

        $sql = "UPDATE comments_on_articles set status=$stat where comments_id=$commentId ";
        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);
        // return $data;
    }

    function Remove_Comments($commentId) {

        $sql = "DELETE from comments_on_articles  where comments_id=$commentId ";
        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);


        // return $data;
    }

    function Remove_Article($articleId) {

        $sql = "DELETE from article_attachement  where article_id=$articleId ";
        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);

        $sql = "DELETE from article  where article_id=$articleId ";
        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);
        // return $data;
    }

    function Update_Message_Read_Status($messageid, $stat) {


        $sql = "UPDATE messages set read_status=$stat , read_date_time=NOW()  where messages_id=$messageid";
        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);
        // return $data;
    }

    function Update_User_group($userid, $groupid, $todo) {//todo is a varible /n 1= insert /n 2=delete
        if ($todo == 1) {
            $sql = "insert into message_group_members (group_id,user_id)VALUES($groupid,$userid)";
        } else {
            $sql = "delete from message_group_members where group_id=$groupid and user_id=$userid";
        }

        $this->load->model('get_db');
        $this->get_db->execute_Nquery($sql);

        if ($todo == 1) {
            echo '1';
        } else {
            echo '2';
        }
    }

    public function checkLogin() {
        $photo = $this->Get_Field_value_Given_Field_for_photoLoad("users", "photo", "user_name", $this->input->post('email'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xxs_clean|callback_valide_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|Md5|trim');
        if ($this->form_validation->run()) {
            $data = array(
                'email' => $this->input->post('email'),
                'Is_logged_in' => 1,
                'photo' => $photo
            );
            $this->session->set_userdata($data);
            $this->Set_User_cookkkeies();
            $this->main();
        } else {

            $this->load->view('login');
        }
    }

    function Set_User_cookkkeies() {
        $remember = $this->input->post('remember');
        if ($remember != "") {

            $this->load->helper('cookie');
            $cookie = array(
                'name' => 'username',
                'value' => $this->input->post('email'),
                'expire' => 86500 * 7,
            );
            $this->input->set_cookie($cookie);

            $cookieNew = array(
                'name' => 'password',
                'value' => $this->input->post('pass'),
                'expire' => 86500 * 7,
            );
            $this->input->set_cookie($cookieNew);
        }
    }

    public function valide_credentials() {
        $this->load->model('model_users');
        if ($this->model_users->can_log_in()) {
            return true;
        } else {
            $this->form_validation->set_message('valide_credentials', 'Incorect Username / Password Or Not Accepted');
            return false;
        }
    }

    function header() {
        $this->load->view('header');
    }

    function user_groups() {
        $this->load->view('user_groups');
    }

    function message_groups() {
        $this->load->view('create_Message_group');
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

    function get_Field($tableName, $fieldName, $givenField, $givenFieldValue) {
        $newval = str_replace("%20", " ", $givenFieldValue);
        $query = $this->db->query("select $fieldName  from  $tableName where $givenField='$newval' ");
        return $query->result();
    }

}

?>
