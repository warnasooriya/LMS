<?php
class Print_vehicle_details extends CI_Controller
{
    public function print_report($recno)
    {
        $this->load->model('get_db');
        $data['result']=$this->get_db->get_Data($recno);
        $this->load->view('print_vehicleData',$data);        
        
    }
}
?>
