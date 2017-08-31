<?php
error_reporting(0);
$dbhandle = mysql_connect('localhost', 'imvisi5_judgingasystem','@R&wPhdRTxp;') or die("Unable to connect to M");
$selected = mysql_select_db("imvisi5_indextoscale",$dbhandle) ;




function getallCategories($userid){

	$categories = array();
	$all_categories = mysql_query("SELECT * FROM `its_main_categories` ORDER BY `id` ASC");
	while($row = mysql_fetch_assoc($all_categories)){
		$categories[] = $row;
	}

	foreach($categories as $key => $singlecategory){
	
		$cat_id = $singlecategory['id'];

		$getdata = mysql_fetch_assoc(mysql_query("SELECT `status_type` FROM `its_main_category_subscription` WHERE `main_category_id` = '".$cat_id."' AND `user_id` = '".$userid."' ORDER BY `id` DESC LIMIT 1 "));
	
		if(!empty($getdata)){
			$status_type = $getdata['status_type'];
		}else{
			$status_type = '0';
		}
		$categories[$key]['category_subscription'] = $status_type;

		$sub_categories = array();
		$getsub_categories = mysql_query("SELECT * FROM `its_sub_categories` WHERE `main_category_id` = '".$cat_id."' ORDER BY `id` ASC");
		while($rows = mysql_fetch_assoc($getsub_categories)){
			$sub_categories[] = $rows;
		}
		foreach($sub_categories as $key2 => $singlesubcat){
	
			$subcatid = $singlesubcat['id'];
			$subcatdata = mysql_fetch_assoc(mysql_query("SELECT `status_type` FROM `its_subcategory_subscription` WHERE `main_category_id` = '".$cat_id."' AND `subcategory_id` = '".$subcatid."' AND `user_id` = '".$userid."' ORDER BY `id` DESC LIMIT 1 "));
	
			if(!empty($subcatdata)){
				$statusType = $subcatdata['status_type'];
			}else{
				$statusType = '0';
			}
			$sub_categories[$key2]['subcategory_subscription'] = $statusType;
		}
		$categories[$key]['sub_categories'] = $sub_categories;
	}
	return $categories;
}


?>