<?php
include("config.php");

$params = explode(",", $argv[1]);

$userid			 = $params[0];//$_GET['userid'];
$maincategory_id = $params[1];//$_GET['catid'];
$status_type	 = $params[2];//$_GET['status_type'];
$subcategory_id	 = $params[3];//$_GET['subcatid'];


// $userid			 = $_GET['userid'];
// $maincategory_id = $_GET['catid'];
// $status_type	 = $_GET['status_type'];
// $subcategory_id	 = $_GET['subcatid'];

if(!empty($subcategory_id)){

	if((!empty($userid)) && (!empty($maincategory_id)) && (!empty($subcategory_id)) && (isset($status_type))){

		if($status_type == 1){
			$ifalreadysubscribedQuery = "SELECT * FROM `its_subcategory_subscription` WHERE `main_category_id` = '$maincategory_id' AND `subcategory_id` = '$subcategory_id' AND `user_id` = '$userid' AND `status_type` = '$status_type' ORDER BY `id` DESC LIMIT 1 ";
		}else{
			$ifalreadysubscribedQuery = "SELECT * FROM `its_subcategory_subscription` WHERE `main_category_id` = '$maincategory_id' AND `subcategory_id` = '$subcategory_id' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1";
		}
		$alreadysubscribeddata = mysql_fetch_assoc(mysql_query($ifalreadysubscribedQuery));

		$existingcount = "SELECT `total_subscriptions_counts` FROM `its_sub_categories` WHERE `id` = '$subcategory_id'";
		$categorysubscriptioncount = mysql_fetch_assoc(mysql_query($existingcount));
		$existingcount = $categorysubscriptioncount['total_subscriptions_counts'];

		if(!empty($alreadysubscribeddata)){
			if($status_type == 0){
				$unsubscribeQuery = "UPDATE `its_subcategory_subscription` SET `status_type`= '0' WHERE `main_category_id` = '$maincategory_id' AND `subcategory_id` = '$subcategory_id' AND `user_id` = '$userid'";
				$unsubscribeUser = mysql_query($unsubscribeQuery);
				
				if($unsubscribeUser ==true){
					$finalcount = ($existingcount - 1);
				
					$updatecountsql = "UPDATE `its_sub_categories` SET `total_subscriptions_counts`= '$finalcount' WHERE `id` = '$subcategory_id'";
					$updatecountquery = mysql_query($updatecountsql);
					
					$getlogQuery = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `its_subcategory_subscription_logs` WHERE `main_category_id` = '$maincategory_id' AND `subcategory_id` = '$subcategory_id' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1"));
					$logid = $getlogQuery['id'];
					
					$logHistory = mysql_query("UPDATE `its_subcategory_subscription_logs` SET `enddate`= NOW() WHERE `id` = '$logid'");
					
					$queryresult = getallCategories($userid);
					$message = "You're successfully unsubscribed with this sub-category.";
					$response = array('error'=>0,'success'=>200,'message'=> $message, 'body'=> $queryresult);
				}else{
					$queryresult = getallCategories($userid);
					$message = "You're already Unsubscribed with this sub-category.";
					$response = array('error'=>1,'success'=>0,'message'=> $message, 'body'=> $queryresult);
				}
			}else{
				$queryresult = getallCategories($userid);
				$message = "You're already subscribed with this sub-category.";
				$response = array('error'=>1,'success'=>0,'message'=> $message, 'body'=> $queryresult);
			}
		}else{

			$checkif_maincat_subscribed = mysql_query("SELECT * FROM `its_main_category_subscription` WHERE `main_category_id` = '$maincategory_id' AND `user_id` = '$userid' AND `status_type` = '1' ");
			$maincat_subscribed_data = mysql_fetch_assoc($checkif_maincat_subscribed);
			
			if(empty($maincat_subscribed_data)){
				$maincat_subscribedinsertQuery = "INSERT INTO `its_main_category_subscription`(`main_category_id`, `user_id`, `status_type`) VALUES ('$maincategory_id','$userid','1')";
				$subscribe_maincat_User = mysql_query($maincat_subscribedinsertQuery);
				
				$categorysubscriptioncount1 = mysql_fetch_assoc(mysql_query("SELECT `total_subscriptions` FROM `its_main_categories` WHERE `id` = '$maincategory_id' "));
				$existingcount1 = $categorysubscriptioncount1['total_subscriptions'];
				
				if($subscribe_maincat_User == true){
					$finalcount1 = ($existingcount1 + 1);
					$updatecountquery = mysql_query("UPDATE `its_main_categories` SET `total_subscriptions`= '$finalcount1' WHERE `id` = '$maincategory_id'");
				
					$main_category_subscription_logs = "INSERT INTO `its_main_category_subscription_logs`(`main_category_id`, `user_id`, `start_date`) VALUES ('$maincategory_id','$userid',NOW())";
					$main_category_subscription_logsHistory = mysql_query($main_category_subscription_logs);
				}
			}
			
			$insertQuery = "INSERT INTO `its_subcategory_subscription`(`main_category_id`, `subcategory_id`, `user_id`, `status_type`) VALUES ('$maincategory_id','$subcategory_id','$userid','1')";
			$subscribeUser = mysql_query($insertQuery);
			if($subscribeUser == true){
				$finalcount = ($existingcount + 1);
				
				$updatecountQuery = "UPDATE `its_sub_categories` SET `total_subscriptions_counts`= '$finalcount' WHERE `id` = '$subcategory_id'";
				$updatecountquery = mysql_query($updatecountQuery);
				
				$insertlogHistory = "INSERT INTO `its_subcategory_subscription_logs` (`main_category_id`, `subcategory_id`, `user_id`, `start_date`) VALUES ('$maincategory_id','$subcategory_id','$userid', NOW())";
				$logHistory = mysql_query($insertlogHistory);
			
				$queryresult = getallCategories($userid);
				$message = "You're successfully subscribed with this sub-category.";
				$response = array('error'=>0,'success'=>200,'message'=> $message, 'body'=> $queryresult);
			}
		}
	}else{
		$queryresult = getallCategories($userid);
		$message = "Please fill all the required Parameters.11";
		$response = array('error'=>1,'success'=>0,'message'=> $message, 'body'=> $queryresult);
	}
}else{
	
	if((!empty($userid)) && (!empty($maincategory_id)) && (isset($status_type))){

		if($status_type == 1){
			$ifalreadysubscribedQuery = "SELECT * FROM `its_main_category_subscription` WHERE `main_category_id` = '$maincategory_id' AND `user_id` = '$userid' AND `status_type` = '$status_type' ORDER BY `id` DESC LIMIT 1 ";
		}else{
			$ifalreadysubscribedQuery = "SELECT * FROM `its_main_category_subscription` WHERE `main_category_id` = '$maincategory_id' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1";
		}
		$alreadysubscribeddata = mysql_fetch_assoc(mysql_query($ifalreadysubscribedQuery));

		$categorysubscriptioncount = mysql_fetch_assoc(mysql_query("SELECT `total_subscriptions` FROM `its_main_categories` WHERE `id` = '$maincategory_id'"));
		$existingcount = $categorysubscriptioncount['total_subscriptions'];


		if(!empty($alreadysubscribeddata)){
			if($status_type == 0){
				$unsubscribeQuery = "UPDATE `its_main_category_subscription` SET `status_type`= '0' WHERE `main_category_id` = '$maincategory_id' AND `user_id` = '$userid'";
				$unsubscribeUser = mysql_query($unsubscribeQuery);
				
				if($unsubscribeUser == true){
					$finalcount = ($existingcount - 1);
					$updatecountquery = mysql_query("UPDATE `its_main_categories` SET `total_subscriptions`= '$finalcount' WHERE `id` = '$maincategory_id'");
					
					$getlogQuery = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `its_main_category_subscription_logs` WHERE `main_category_id` = '$maincategory_id' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1"));
					$logid = $getlogQuery['id'];
					
					$logHistory = mysql_query("UPDATE `its_main_category_subscription_logs` SET `enddate`= NOW() WHERE `id` = '$logid'");
					
					if($logHistory ==true){
					
						$users_Subscribed_SubcategoryID = array();
						$users_Subscribed_Subcategories = mysql_query("SELECT `subcategory_id` FROM `its_subcategory_subscription` WHERE `main_category_id` = '$maincategory_id' AND `user_id` = '$userid' AND `status_type` = '1'");
						while($subscribed_result = mysql_fetch_assoc($users_Subscribed_Subcategories)){
							$users_Subscribed_SubcategoryID[] = $subscribed_result['subcategory_id'];
						}			
						
						foreach($users_Subscribed_SubcategoryID as $single_subcat_ID){
							
							$existingSubcount = "SELECT `total_subscriptions_counts` FROM `its_sub_categories` WHERE `id` = '$single_subcat_ID'";
							$Subcategorysubscriptioncount = mysql_fetch_assoc(mysql_query($existingSubcount));
							$existingsubcount = $Subcategorysubscriptioncount['total_subscriptions_counts'];
							
							$unsubscribeQuery = "UPDATE `its_subcategory_subscription` SET `status_type`= '0' WHERE `main_category_id` = '$maincategory_id' AND `subcategory_id` = '$single_subcat_ID' AND `user_id` = '$userid'";
							$unsubscribeUser = mysql_query($unsubscribeQuery);
				
							if($unsubscribeUser ==true){
								
								$finalSubcount = ($existingsubcount - 1);
								$updatecountsql = "UPDATE `its_sub_categories` SET `total_subscriptions_counts`= '$finalSubcount' WHERE `id` = '$single_subcat_ID'";
								$updatecountquery = mysql_query($updatecountsql);
									
								$getlogQuery = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `its_subcategory_subscription_logs` WHERE `main_category_id` = '$maincategory_id' AND `subcategory_id` = '$single_subcat_ID' AND `user_id` = '$userid' ORDER BY `id` DESC LIMIT 1"));
								$logid = $getlogQuery['id'];
					
								$logHistory = mysql_query("UPDATE `its_subcategory_subscription_logs` SET `enddate`= NOW() WHERE `id` = '$logid'");
							}
						}
					}
					
					$queryresult = getallCategories($userid);
					$message = "You're successfully unsubscribed with this category.";
					$response = array('error'=>0,'success'=>200,'message'=> $message, 'body'=> $queryresult);
				}else{
					$queryresult = getallCategories($userid);
					$message = "You're already Unsubscribed with this category.";
					$response = array('error'=>1,'success'=>0,'message'=> $message, 'body'=> $queryresult);
				}
			}else{
				$queryresult = getallCategories($userid);
				$message = "You're already subscribed with this category.";
				$response = array('error'=>1,'success'=>0,'message'=> $message, 'body'=> $queryresult);
			}
		}else{
			$insertQuery = "INSERT INTO `its_main_category_subscription`(`main_category_id`, `user_id`, `status_type`) VALUES ('$maincategory_id','$userid','1')";
			$subscribeUser = mysql_query($insertQuery);
			
			if($subscribeUser == true){
				$finalcount = ($existingcount + 1);
				$updatecountquery = mysql_query("UPDATE `its_main_categories` SET `total_subscriptions`= '$finalcount' WHERE `id` = '$maincategory_id'");
				
				$insertlogHistory = "INSERT INTO `its_main_category_subscription_logs`(`main_category_id`, `user_id`, `start_date`) VALUES ('$maincategory_id','$userid',NOW())";
				$logHistory = mysql_query($insertlogHistory);
			
				$queryresult = getallCategories($userid);
				$message = "You're successfully subscribed with this category.";
				$response = array('error'=>0,'success'=>200,'message'=> $message, 'body'=> $queryresult);
			}
		}
		
	}else{
		$queryresult = getallCategories($userid);
		$message = "Please fill all the required Parameters.12";
		$response = array('error'=>1,'success'=>0,'message'=> $message, 'body'=> $queryresult);
	}
}
//echo "<pre/>"; print_r($response);
?>