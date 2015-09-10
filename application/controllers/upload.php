<?php

class Upload extends CI_Controller {

//	function index()
//	{
//		$this->load->view('upload_form');
//	}

	function do_upload()
	{
            echo 'incoming';
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			echo  $this->upload->display_errors();
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			foreach ($data as $da)
                        {
                            echo $da;
                        }
		}
	}
}
?>