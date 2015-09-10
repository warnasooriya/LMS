<?php
class print_vehicle extends CI_Controller
{
    public function index()
    {
        $id=$this->input->get('id'); 
        $this->load->model('get_db');
        $data['result']=$this->get_db->get_Data($id);
        $this->load->view('print_vehicleData',$data); 
    }
    
      public function print_Bike()
    {
        $id=$this->input->get('id'); 
        $this->load->model('get_db');
        $data['result']=$this->get_db->get_Data_bike($id);
        $this->load->view('print_BikeData',$data); 
    }
}
?>
