<?php
$output_dir = "../uploads/images/";
if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
 	 	$fileName = $_FILES["myfile"]["name"];
                $temp = explode(".", $_FILES["myfile"]["name"]);
                $prename=$temp[0];
                $newname = round(microtime(true)) . '.' . end($temp);
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$prename.$newname);
    	$ret[]= $prename.$newname;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
                $temp = explode(".", $_FILES["myfile"]["name"][$i]);
                $newname = round(microtime(true)) . '.' . end($temp);
                 $prename=$temp[0];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$prename.$newname);
	  	$ret[]= $prename.$newname;
	  }
	
	}
    echo json_encode($ret);
 }
 ?>