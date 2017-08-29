<?php
include("config.php");

$params = explode(",", $argv[1]);
$category_id 	 = $params[0]; //'3';
$sub_category_id = $params[1];	//'2';
$arrayResult = array();

if($category_id == 1){
	$Query = "SELECT * FROM `its_properties` WHERE `main_category_id` = '$category_id' AND `sub_category_id` = '$sub_category_id' ORDER BY `id` DESC";
	$sqlQuery = mysql_query($Query);
	while($datarow = mysql_fetch_assoc($sqlQuery)){	 
		$arrayResult[] = $datarow;
	}

	foreach($arrayResult as $key => $singleresult){
		$property_id = $singleresult['id'];
	
		$allimagesArr = array();
		$imgQuery = mysql_query("SELECT * FROM `its_property_images` WHERE `property_id` = '$property_id'");
		while($imgrow = mysql_fetch_assoc($imgQuery)){	 
			$allimagesArr[] = $imgrow;
		}
		$arrayResult[$key]['AllPropertyImages'] = $allimagesArr;

		$extraLinksArr = array();
		$extraLinksQuery = mysql_query("SELECT * FROM `its_property_extra_link` WHERE `property_id` = '$property_id'");
		while($extraLinksrow = mysql_fetch_assoc($extraLinksQuery)){	 
			$extraLinksArr[] = $extraLinksrow;
		}
		$arrayResult[$key]['extraLinks'] = $extraLinksArr;
	}
	$response = array('error'=>0,'success'=>1,'body'=> $arrayResult);
	
}else if($category_id == 2){

	$Query = "SELECT * FROM `its_fashion` WHERE `main_category_id` = '$category_id' AND `sub_category_id` = '$sub_category_id' ORDER BY `id` DESC";
	$sqlQuery = mysql_query($Query);
	while($datarow = mysql_fetch_assoc($sqlQuery)){	 
		$arrayResult[] = $datarow;
	}
	$response = array('error'=>0,'success'=>1,'body'=> $arrayResult);
}
//echo "<pre/>"; print_r($queryresult);
?>