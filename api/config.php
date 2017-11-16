<?php
error_reporting(E_ALL);
$con = mysqli_connect('localhost', 'imvisile_main','imV!s!lE#8687@',"imvisile_indextoscale") or die("Unable to connect to M");

//die('m here');


function getallCategories($userid){

	$categories = array();
	//echo "SELECT * FROM `its_main_categories` ORDER BY `id` ASC";
	$all_categories = mysqli_query($con,"SELECT * FROM `its_main_categories` ORDER BY `id` ASC");
	while($row = mysqli_fetch_assoc($all_categories)){
		$categories[] = $row;
	}

	foreach($categories as $key => $singlecategory){
	
		$cat_id = $singlecategory['id'];
		
		
		$q1 = mysqli_query($con,"SELECT `status_type` FROM `its_main_category_subscription` WHERE `main_category_id` = '".$cat_id."' AND `user_id` = '".$userid."' ORDER BY `id` DESC LIMIT 1 ");

		$getdata = mysqli_fetch_assoc($q1);
	
		if(!empty($getdata)){
			$status_type = $getdata['status_type'];
		}else{
			$status_type = '0';
		}
		$categories[$key]['category_subscription'] = $status_type;

		$sub_categories = array();
		$getsub_categories = mysqli_query($con,"SELECT * FROM `its_sub_categories` WHERE `main_category_id` = '".$cat_id."' ORDER BY `id` ASC");
		while($rows = mysqli_fetch_assoc($getsub_categories)){
			$sub_categories[] = $rows;
		}
		foreach($sub_categories as $key2 => $singlesubcat){
	
			$subcatid = $singlesubcat['id'];
			$q2 = mysqli_query($con,"SELECT `status_type` FROM `its_subcategory_subscription` WHERE `main_category_id` = '".$cat_id."' AND `subcategory_id` = '".$subcatid."' AND `user_id` = '".$userid."' ORDER BY `id` DESC LIMIT 1 ");
			$subcatdata = mysqli_fetch_assoc($q2);
	
			if(!empty($subcatdata)){
				$statusType = $subcatdata['status_type'];
			}else{
				$statusType = '0';
			}
			$sub_categories[$key2]['subcategory_subscription'] = $statusType;
		}
		$categories[$key]['sub_categories'] = $sub_categories;
	}
	return $categories; //print_r($categories);
}
?>