<?php
include("config.php");

$params = explode(",", $argv[1]);
$userid 	 = $params[0];
$categoryid  = $params[1];
$status_type = $params[2];
// $userid 	 = $_GET['userid'];
// $categoryid  = $_GET['catid'];
// $status_type = $_GET['status_type'];


if((!empty($userid)) && (!empty($categoryid)) && (!empty($status_type))){

if($status_type == 1){
	$ifalreadysubscribedQuery = "SELECT * FROM `its_main_category_subscription` WHERE `main_category_id` = '$categoryid' AND `user_id` = '$userid' AND `status_type` = '$status_type' ORDER BY `id` DESC LIMIT 1 ";
}else{
	$ifalreadysubscribedQuery = "SELECT * FROM `its_main_category_subscription` WHERE `main_category_id` = '$categoryid' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1";
}
$alreadysubscribeddata = mysql_fetch_assoc(mysql_query($ifalreadysubscribedQuery));

$categorysubscriptioncount = mysql_fetch_assoc(mysql_query("SELECT `total_subscriptions` FROM `its_main_categories` WHERE `id` = '$categoryid'"));
$existingcount = $categorysubscriptioncount['total_subscriptions'];


if(!empty($alreadysubscribeddata)){
	if($status_type == 0){
		$unsubscribeQuery = "UPDATE `its_main_category_subscription` SET `status_type`= '0' WHERE `main_category_id` = '$categoryid' AND `user_id` = '$userid'";
		$unsubscribeUser = mysql_query($unsubscribeQuery);
		
		if($unsubscribeUser == true){
			$finalcount = ($existingcount - 1);
			$updatecountquery = mysql_query("UPDATE `its_main_categories` SET `total_subscriptions`= '$finalcount' WHERE `id` = '$categoryid'");
			
			$getlogQuery = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `its_main_category_subscription_logs` WHERE `main_category_id` = '$categoryid' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1"));
			$logid = $getlogQuery['id'];
			
			$logHistory = mysql_query("UPDATE `its_main_category_subscription_logs` SET `enddate`= NOW() WHERE `id` = '$logid'");
			
			if($logHistory ==true){
			
				$users_Subscribed_SubcategoryID = array();
				$users_Subscribed_Subcategories = mysql_query("SELECT `subcategory_id` FROM `its_subcategory_subscription` WHERE `main_category_id` = '$categoryid' AND `user_id` = '$userid' AND `status_type` = '1'");
				while($subscribed_result = mysql_fetch_assoc($users_Subscribed_Subcategories)){
					$users_Subscribed_SubcategoryID[] = $subscribed_result['subcategory_id'];
				}			
				
				foreach($users_Subscribed_SubcategoryID as $single_subcat_ID){
					
					$existingSubcount = "SELECT `total_subscriptions_counts` FROM `its_sub_categories` WHERE `id` = '$single_subcat_ID'";
					$Subcategorysubscriptioncount = mysql_fetch_assoc(mysql_query($existingSubcount));
					$existingsubcount = $Subcategorysubscriptioncount['total_subscriptions_counts'];
					
					$unsubscribeQuery = "UPDATE `its_subcategory_subscription` SET `status_type`= '0' WHERE `main_category_id` = '$categoryid' AND `subcategory_id` = '$single_subcat_ID' AND `user_id` = '$userid'";
					$unsubscribeUser = mysql_query($unsubscribeQuery);
		
					if($unsubscribeUser ==true){
						
			 			$finalSubcount = ($existingsubcount - 1);
						$updatecountsql = "UPDATE `its_sub_categories` SET `total_subscriptions_counts`= '$finalSubcount' WHERE `id` = '$single_subcat_ID'";
						$updatecountquery = mysql_query($updatecountsql);
							
						$getlogQuery = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `its_subcategory_subscription_logs` WHERE `main_category_id` = '$categoryid' AND `subcategory_id` = '$single_subcat_ID' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1"));
						$logid = $getlogQuery['id'];
			
						$logHistory = mysql_query("UPDATE `its_subcategory_subscription_logs` SET `enddate`= NOW() WHERE `id` = '$logid'");
					}
				}
			}

			$message = "You're successfully unsubscribed with this category.";
			$queryresult = array('error'=>0,'success'=>1,'body'=> $message);
		}else{
			$message = "You're already Unsubscribed with this category.";
			$queryresult = array('error'=>1,'success'=>0,'body'=> $message);
		}
	}else{
		$message = "You're already subscribed with this category.";
		$queryresult = array('error'=>1,'success'=>0,'body'=> $message);
	}
}else{
	$insertQuery = "INSERT INTO `its_main_category_subscription`(`main_category_id`, `user_id`, `status_type`) VALUES ('$categoryid','$userid','1')";
	$subscribeUser = mysql_query($insertQuery);
	
	if($subscribeUser == true){
		$finalcount = ($existingcount + 1);
		$updatecountquery = mysql_query("UPDATE `its_main_categories` SET `total_subscriptions`= '$finalcount' WHERE `id` = '$categoryid'");
		
		$insertlogHistory = "INSERT INTO `its_main_category_subscription_logs`(`main_category_id`, `user_id`, `start_date`) VALUES ('$categoryid','$userid',NOW())";
		$logHistory = mysql_query($insertlogHistory);
	
		$message = "You're successfully subscribed with this category.";
		$queryresult = array('error'=>0,'success'=>1,'body'=> $message);
	}
}
$response = $queryresult;
}else{
	$message = "Please fill all the required Parameters.";
	$response = array('error'=>1,'success'=>0,'body'=> $message);
}
//echo "<pre/>"; print_r($response);
?>