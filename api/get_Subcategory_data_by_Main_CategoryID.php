<?php
include("config.php");

$params = explode(",", $argv[1]);
$category_id 	 = $params[0]; //'3';
$sub_category_id = $params[1];	//'2';
$arrayResult = array();

if($category_id == 1){
	$Query = "SELECT * FROM `its_properties` WHERE `main_category_id` = '$category_id' AND `sub_category_id` = '$sub_category_id' ORDER BY `id` DESC";
	$sqlQuery = mysqli_query($con,$Query);
	while($datarow = mysqli_fetch_assoc($sqlQuery)){	 
		$arrayResult[] = $datarow;
	}

	foreach($arrayResult as $key => $singleresult){
		$property_id = $singleresult['id'];
	
		$allimagesArr = array();
		$imgQuery = mysqli_query($con,"SELECT * FROM `its_property_images` WHERE `property_id` = '$property_id'");
		while($imgrow = mysqli_fetch_assoc($imgQuery)){	 
			$allimagesArr[] = $imgrow;
		}
		$arrayResult[$key]['AllPropertyImages'] = $allimagesArr;

		$extraLinksArr = array();
		$extraLinksQuery = mysqli_query($con,"SELECT * FROM `its_property_extra_link` WHERE `property_id` = '$property_id'");
		while($extraLinksrow = mysqli_fetch_assoc($extraLinksQuery)){	 
			$extraLinksArr[] = $extraLinksrow;
		}
		$arrayResult[$key]['extraLinks'] = $extraLinksArr;
	}
	$response = array('error'=>0,'success'=>1,'body'=> $arrayResult);
	
}else if($category_id == 2){

	$Query = "SELECT * FROM `its_fashion` WHERE `main_category_id` = '$category_id' AND `sub_category_id` = '$sub_category_id' ORDER BY `id` DESC";
	$sqlQuery = mysqli_query($con,$Query);
	while($datarow = mysqli_fetch_assoc($sqlQuery)){	 
		$arrayResult[] = $datarow;
	}
	$response = array('error'=>0,'success'=>1,'body'=> $arrayResult);
}
//echo "<pre/>"; print_r($response);
?>