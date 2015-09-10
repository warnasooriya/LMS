<?php

class MessageSend extends CI_Controller {

    public function index() {

        try {



            $newRow = array(
                array(
                    "from_user" => $this->input->post('from_id'),
                    "to_user" => $this->input->post('userid'),
                    "to_group" => $this->input->post('group'),
                    "message_description" => $this->input->post('compose-textarea'),
                    "subject" => $this->input->post('subject')
            ));
            $table['table'] = "messages";
            $this->load->model('get_db');
            $data['result'] = $this->get_db->set_Data_Messages($newRow, $table);

            foreach ($data['result'] as $row) {
                $message_id = $row->messages_id;
            }
            
            $newRow_sentMessages = array(
                array(
                    "from_user" => $this->input->post('from_id'),
                    "to_user" => $this->input->post('userid'),
                    "to_group" => $this->input->post('group'),
                    "message_description" => $this->input->post('compose-textarea'),
                    "subject" => $this->input->post('subject')
            ));
            
            $table['table'] = "sent_messages";
            $this->load->model('get_db');
            $data['result'] = $this->get_db->set_Data($newRow_sentMessages, $table,'sent_messages_id');

            foreach ($data['result'] as $row) {
                $Sent_message_id = $row->sent_messages_id;
            }
            
            
            
            
            
            
            

            if (isset($_FILES['attachment'])) {

                $uploaddir = 'messages/';
                $newname = basename($_FILES['attachment']['name']);

                $temp = explode(".", $_FILES["attachment"]["name"]);
                $newname = round(microtime(true)) . '.' . end($temp);
                // move_uploaded_file($_FILES["attachment"]["tmp_name"], "messages/" . $newfilename);


                if (move_uploaded_file($_FILES["attachment"]["tmp_name"], "messages/" . $newname)) {


                    $row = array(
                        array(
                            "message_id" => $message_id,
                            "file_type" => $_FILES['attachment']["type"],
                            "file_source" => $newname
                    ));

                    $table['table'] = "message_attachment";
                    $this->load->model('get_db');
                    $data['result'] = $this->get_db->Set_Data_Auto($row, $table);
                    
                    
                    // sent messages
                    
                     $sentrow = array(
                        array(
                            "sent_message_id" => $Sent_message_id,
                            "file_type" => $_FILES['attachment']["type"],
                            "file_source" => $newname
                    ));

                    $table['table'] = "sent_message_attachment";
                    $this->load->model('get_db');
                    $data['result'] = $this->get_db->Set_Data_Auto($sentrow, $table);
                    
                    
                    
                    
                    
                } else {
                    
                }
            }

            $msg = "Message Sent Successfully !";
            $stst = 1;
        } catch (Exception $ex) {
            $msg = "Error Send Message !";
            $stst = 0;
        }

        $newdata = array(
            'message' => $msg,
            'stst' => $stst
        );

        $this->session->set_userdata($newdata);

        redirect('main', 'refresh');
    }

}

?>