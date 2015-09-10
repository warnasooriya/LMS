<?php

class Get_vehicle_data extends CI_Controller {

    public function Load($tablename,$whereField,$whereValue) {
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_filter_data($tablename,$whereField, $whereValue);
         echo '<table id="example" class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <td> Report No </td>
                                        <td> Date </td>
                                        <td> Customer </td>
                                        <td> Vehicle Details </td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>        ';
         
        foreach ($data['result'] as $row) {
           
            echo '   <tr>
                                            <td>'.$row->no.'</td>
                                            <td>'.$row->valuationDate.' </td>
                                            <td>'.$row->customer.'</td>
                                            <td> '.$row->make . ' - ' . $row->model . '  -  ' . $row->classification . '<p>Reg No : ' . $row->registration_no. '<p>Eng No : '. $row->engine_no .'<p>Chassis No :'.$row->chassis_no . ' </td>
                                           
                                            <td><a href="vehicleEvaluation?no='.$row->no.'"><span class="label label-primary">Edit</span></a><a href="print_vehicle?id='.$row->no.'"> <span class="label label-primary">Print</span></a></td>
                                                


            </tr>
';
        }
        echo '</tbody>
</table>';
    }
    
    
        public function Load_bike($tablename,$whereField,$whereValue) {
        $this->load->model('get_db');
        $data['result'] = $this->get_db->get_filter_data($tablename,$whereField, $whereValue);
         echo '<table id="example" class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <td> Report No </td>
                                        <td> Date </td>
                                        <td> Customer </td>
                                        <td> Vehicle Details </td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>        ';
         
        foreach ($data['result'] as $row) {
           
            echo '   <tr>
                                            <td>'.$row->no.'</td>
                                            <td>'.$row->valuation_date.' </td>
                                            <td>'.$row->customer.'</td>
                                             <td>'.$row->make . ' - ' . $row->model . ' - ' . $row->reg_no.'<br>Eng No : '.$row->EngineNumber.'<br>Chassis No : '.$row->chassis_number.
                                            
                                            '</td>

                                            <td><a href="bike?no='.$row->no.'"><span class="label label-primary">Edit</span></a><a href="print_vehicle/print_Bike?id='.$row->no.'"> <span class="label label-primary">Print</span></a></td>
                                                


            </tr>
';
        }
        echo '</tbody>
</table>';
    }

}
?>
