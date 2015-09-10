<?php

class Save_bike_valuation extends CI_Controller {

    public function index() {
        if (isset($_POST['no'])) {
            $no = $_POST['no'];
        }
        $engno = $this->input->post('EngineNumber');
  $fimg = $this->input->post('fimg');
        $rimg = $this->input->post('rimg');
        
        $isUpload = false;
        try {
            if (isset($_FILES['frontimage'])) {
                $fimageType = $this->Upload_image("frontimage", $engno . 'front');
            }
            if (isset($_FILES['rearimage'])) {
                $rimageType = $this->Upload_image("rearimage", $engno . 'rear');
            }

            //  $fimageType = $this->Upload_image("frontimage", $engno . 'front');
            // $rimageType = $this->Upload_image("rearimage", $engno . 'rear');
            $isUpload = true;
        } catch (Exception $e) {
            $isUpload = FALSE;
        }
        
        
        
             if(strlen($fimageType)==0)
            {
                $fimageType=$this->input->post('fimg');
            }
            
             if(strlen($rimageType)==0)
            {
                $rimageType=$this->input->post('rimg');
            }

        
        
        

        $newRow = array(
            array(
                "customer" => $this->input->post('customer'),
                "valuation_date" => $this->input->post('evaluationdate'),
                "make" => $this->input->post('make'),
                "model" => $this->input->post('Model'),
                "reg_no" => $this->input->post('RegisteredNo'),
                "speedoreads" => $this->input->post('SpeedoReads'),
                "speed_unit" => $this->input->post('SpeedoRead'),
                "EngineNumber" => $this->input->post('EngineNumber'),
                "present_value" => $this->input->post('presentvalue'),
                "value_in_word" => $this->input->post('presentvord'),
                "chassis_number" => $this->input->post('ChassisNumber'),
                "EngineAccessories" => $this->input->post('EngineAccessories'),
                "electrical_system" => $this->input->post('ElectricalSystem'),
                "light" => $this->input->post('Light'),
                "Instrumentation" => $this->input->post('Instrumentation'),
                "Steering" => $this->input->post('Steering'),
                "Handle" => $this->input->post('Handle'),
                "Suspension_front" => $this->input->post('Suspentionfront'),
                "Suspension_rear" => $this->input->post('Suspentionrear'),
                "Breaks_front" => $this->input->post('breakfront'),
                "Breaks_rear" => $this->input->post('breakrear'),
                "clutch" => $this->input->post('Clutch'),
                "Gear_Box_stst" => $this->input->post('GearBox'),
                "Gear_Box_type" => $this->input->post('gear'),
                "Propeller_Shaft" => $this->input->post('PropellerShaft'),
                "Rear_Axle" => $this->input->post('RearAxle'),
                "Front_Wheel_Drive" => $this->input->post('FrontWheelDrive'),
                "Four_Wheel_Drive" => $this->input->post('FourWheelDrive'),
                "Body_Work" => $this->input->post('BodyWork'),
                "Seat_and_rim" => $this->input->post('SeatTrim'),
                "Paint" => $this->input->post('Paint'),
                "Chassis" => $this->input->post('Chassis'),
                "Tyres" => $this->input->post('Tyres'),
                "Extra_Accessories" => $this->input->post('ExtraAccessories'),
                "General_Appearance" => $this->input->post('GeneralAppearance'),
                "imagesType_front" => $fimageType,
                "image_type_rear" => $rimageType,
                "remark" => $this->input->post('remark'),
                "yearofmanufacture" => $this->input->post('yearofmanufacture'),
                "forsalesvalue" => $this->input->post('forsalesvalue'),
                "forsaleword" => $this->input->post('forsaleword')
            )
        );


        switch ($_POST['btn']) {
            case 'Update Data' :
                $newRow = array(
                    array(
                        "no" => $no,
                        "customer" => $this->input->post('customer'),
                        "valuation_date" => $this->input->post('evaluationdate'),
                        "make" => $this->input->post('make'),
                        "model" => $this->input->post('Model'),
                        "reg_no" => $this->input->post('RegisteredNo'),
                        "speedoreads" => $this->input->post('SpeedoReads'),
                        "speed_unit" => $this->input->post('SpeedoRead'),
                        "EngineNumber" => $this->input->post('EngineNumber'),
                        "present_value" => $this->input->post('presentvalue'),
                        "value_in_word" => $this->input->post('presentvord'),
                        "chassis_number" => $this->input->post('ChassisNumber'),
                        "EngineAccessories" => $this->input->post('EngineAccessories'),
                        "electrical_system" => $this->input->post('ElectricalSystem'),
                        "light" => $this->input->post('Light'),
                        "Instrumentation" => $this->input->post('Instrumentation'),
                        "Steering" => $this->input->post('Steering'),
                        "Handle" => $this->input->post('Handle'),
                        "Suspension_front" => $this->input->post('Suspentionfront'),
                        "Suspension_rear" => $this->input->post('Suspentionrear'),
                        "Breaks_front" => $this->input->post('breakfront'),
                        "Breaks_rear" => $this->input->post('breakrear'),
                        "clutch" => $this->input->post('Clutch'),
                        "Gear_Box_stst" => $this->input->post('GearBox'),
                        "Gear_Box_type" => $this->input->post('gear'),
                        "Propeller_Shaft" => $this->input->post('PropellerShaft'),
                        "Rear_Axle" => $this->input->post('RearAxle'),
                        "Front_Wheel_Drive" => $this->input->post('FrontWheelDrive'),
                        "Four_Wheel_Drive" => $this->input->post('FourWheelDrive'),
                        "Body_Work" => $this->input->post('BodyWork'),
                        "Seat_and_rim" => $this->input->post('SeatTrim'),
                        "Paint" => $this->input->post('Paint'),
                        "Chassis" => $this->input->post('Chassis'),
                        "Tyres" => $this->input->post('Tyres'),
                        "Extra_Accessories" => $this->input->post('ExtraAccessories'),
                        "General_Appearance" => $this->input->post('GeneralAppearance'),
                        "imagesType_front" => $fimageType,
                        "image_type_rear" => $rimageType,
                        "remark" => $this->input->post('remark'),
                        "yearofmanufacture" => $this->input->post('yearofmanufacture'),
                        "forsalesvalue" => $this->input->post('forsalesvalue'),
                        "forsaleword" => $this->input->post('forsaleword')
                    )
                );


                $this->load->model('get_db');
                $table['table'] = "bike_evaluation";
                $data['result'] = $this->get_db->Update_vehicle($newRow, $table);
                require_once 'pages.php';
                $pages = new Pages;
                $pages->print_success_bike($no, 'Data Saved Successfully !');
                


                break;
            case 'Save Data':
                if ($isUpload == true) {

                    $this->load->model('get_db');
                    $table['table'] = "bike_evaluation";
                    $data['result'] = $this->get_db->set_Data_Vehicle($newRow, $table);

                    foreach ($data['result'] as $row) {
                        $id = $row->no;
                    }

//                    $this->load->model('get_db');
//                    $data['result'] = $this->get_db->get_Data_bike($id);
//                    $this->load->view('print_BikeData', $data);

                    require_once 'pages.php';
                    $pages = new Pages;
                    $pages->print_success_bike($id, 'Data Saved Successfully !');
                }
                break;
        }





        //
    }

    function Upload_image($file, $vehicleNo) {
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

                if (file_exists("bikeImg/" . $_FILES[$file]["name"])) {
                    echo $_FILES[$file]["name"] . " already exists. ";
                } else {
                    $moveResult = move_uploaded_file($_FILES[$file]["tmp_name"], "bikeImg/" . $newfilename);
                    if ($moveResult == true) {
                        // move_uploaded_file(base_url().'vehicleImg/'.$filename, "vehicleImg/" . $newfilename);
//          echo "Stored in: " . "vehicleImg/" .$newfilename;
                        return $newfilename;
                    } else {
                        echo 'Error in Movement';
                    }
                }
            }
        } else {
            //echo "Invalid file, File must be less than 100Kb in size with .jpg, .jpeg, or .gif file extension";
        }
    }

}

?>
