var app = require('express')(); // Express App include
var http = require('http').Server(app); // http server
var mysql = require('mysql'); // Mysql include
var Upload = require('upload-file');
var fileUpload = require('express-fileupload');
var bodyParser = require("body-parser"); // Body parser for fetch posted data
var uuid = require('node-uuid');
const email  = require("smpt-mail");
app.use(bodyParser.json({limit: '50mb'}));
app.use(bodyParser.urlencoded({limit: '50mb', extended: true}));
var path = require('path');     //used for file path
var fs =require('fs-extra');    //File System-needed for renaming file etc
var fs = require('fs'),
    request = require('request');
var runner = require('child_process');
var util = require('util');
app.use(fileUpload());
var array = require('array');
var md5 = require('md5');

/*-----db connection-------*/
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'imvisile_taxiinm',
  password : '#~_Dm9l_V}a3',
  database : 'imvisile_indextoscale'
});
connection.connect();
 
http.listen(4041, function(){
	console.log('Port Used: 4041');
})
 
 
app.use(bodyParser.json({ type: 'application/*+json' }))
app.use(bodyParser.text({ type: 'text/html' }))
var jsonParser = bodyParser.json()

var urlencodedParser = bodyParser.urlencoded({ extended: false })



// Sign up API
app.post('/signup', function (req, res) {
  	
  	var fullname		= req.body.fullname;
	var username		= req.body.username;
  	var email			= req.body.email;
  	var password		= req.body.password;
  	var latitude 		= req.body.latitude;
  	var longitude 		= req.body.longitude;
  	var address			= req.body.address;
  	var data			= { "error":1, "info":"" }
	password = md5(password);
	
	connection.query("SELECT * FROM `its_user_details` WHERE (`username` = '"+username+"' OR `email` = '"+email+"') limit 1" ,function(err, existingdata, fields){
	  if(existingdata.length != 0){
	  		console.log(existingdata);
			data["error"] = 1;
			data["body"] = "Email or username already Exist.Please choose another.";
			res.json(data);
	  }else{
    	if((!!fullname) && (!!username) && (!!email) && (!!password) && (!!latitude) && (!!longitude) && (!!address)){
			connection.query("INSERT INTO `its_user_details`(`fullname`, `username`, `email`, `password`, `latitude`, `longitude`, `address`,`user_type`) VALUES ('"+fullname+"','"+username+"','"+email+"','"+password+"','"+latitude+"','"+longitude+"', '"+address+"','3')", function(error,result,rows){
				var latinsertid = result.insertId;
				connection.query("SELECT * FROM `its_user_details` WHERE `id` = "+latinsertid+ " limit 1" ,function(err, updaterows, fields){
					//console.log(updaterows);
					data["error"] = 0;
					data["updateData"] = 1;
					data["success"] =200;
					data["user_info"] = updaterows;
					res.json(data);
				});
			})
		}else{
			data["body"] = "Please fill all required Parameters.";
			res.json(data);
		}
	  }
	});
});


// API to login user
app.post('/Loginuser', function (req, res) {

  	var username		= req.body.username;
  	var password		= req.body.password;
  	var latitude 		= req.body.latitude;
  	var longitude 		= req.body.longitude;
  	var data = { "error":1, "info":"" };
	
  if(!!username){
	if(!!password){
  		var encPassword	= md5(password);
		connection.query("SELECT * FROM `its_user_details` WHERE (`username` = '"+username+"' OR `email` = '"+username+"') AND `password` = '"+encPassword+"' AND `user_type` = '3' " ,function(err, result, fields){
			//console.log(result);
			if(result.length != 0){
				data["error"] = 0;
				data["success"] =200;
				data["user_info"] = result;
				res.json(data);
			}else{
				data["body"] = "Invalid Credentials..";
				res.json(data);
			}
		});
	}else{
		data["body"] = "password is required.";
		res.json(data);
	} 
  }else{
		data["body"] = "username is required.";
		res.json(data);
  }
});



// API to Get All Main Categories
app.post('/getall_main_Categories', function (req, res) {

  	var userid = req.body.userid;
  	var latitude = req.body.latitude;
  	var longitude = req.body.longitude;
  	var data = { "error":1, "info":"" };
	
	if(!!userid){
	  if(!!latitude && !!longitude){
		var argsString = userid+","+latitude+","+longitude;	//console.log(argsString);
        runner.exec('php -r \'include("api/main_categories.php") ; print json_encode($response);\' '+argsString+'', function(err, phpResponse, stderr) {
        if(err) console.log(err); /* log error */
            var connection = JSON.parse(phpResponse);	//console.log(connection);
        	res.json(connection);		
        });
	  }else{
		data["body"] = "Latitude and Longitude is required.";
		res.json(data);
	  }
	}else{
		data["body"] = "User id is required.";
		res.json(data);
	}
});



// API to subscribe or unsubscribe Main Category
app.post('/subscribeMainCategory', function (req, res) {

  	var userid = req.body.userid;
  	var category_id = req.body.category_id;
  	var status_type = req.body.status_type;
  	var data = { "error":1, "info":"" };
	
	if(!!userid){
	 if(!!category_id){
	  if(!!status_type){
		var argsString = userid+","+category_id+","+status_type;	//console.log(argsString);
        runner.exec('php -r \'include("api/subscribeMainCategory.php") ; print json_encode($response);\' '+argsString+'', function(err, phpResponse, stderr) {
        if(err) console.log(err); /* log error */
            var connection = JSON.parse(phpResponse);	//console.log(connection);
        	res.json(connection);		
        });
	  }else{
		data["body"] = "Status Type is required.";
		res.json(data);
	  }
	 }else{
		data["body"] = "Category id is required.";
		res.json(data);
	 }
	}else{
		data["body"] = "User id is required.";
		res.json(data);
	}
});

// API to subscribe Main Category
app.post('/subscribe_Categories', function (req, res) {

  	var userid = req.body.userid;
  	var maincategory_id = req.body.maincategory_id;
  	var subcategory_id = req.body.subcategory_id;
  	var status_type = req.body.status_type;
  	var data = { "error":1, "info":"" };
	
	if(!!userid){
	  if(!!maincategory_id){
	   if(!!status_type){
		var argsString = userid+","+maincategory_id+","+status_type+","+subcategory_id;	//console.log(argsString);
        runner.exec('php -r \'include("api/subscribe_SubCategory.php") ; print json_encode($response);\' '+argsString+'', function(err, phpResponse, stderr) {
        if(err) console.log(err); /* log error */
            var connection = JSON.parse(phpResponse);	//console.log(connection);
        	res.json(connection);		
        });
	   }else{
		data["body"] = "Status Type is required.";
		res.json(data);
	   }
	  }else{
		data["body"] = "Main Category id is required.";
		res.json(data);
	  }
	}else{
		data["body"] = "User id is required.";
		res.json(data);
	}
});



//API to Get Properties by Category
app.post('/get_Subcategory_data_by_Main_CategoryID', function (req, res) {

  	var category_id = req.body.category_id;
  	var sub_category_id = req.body.sub_category_id;
  	var data = { "error":1, "info":"" };
	
	if(!!category_id){
	  if(!!sub_category_id){
	  
		var argsString = category_id+","+sub_category_id;	//console.log(argsString);
        runner.exec('php -r \'include("api/get_Subcategory_data_by_Main_CategoryID.php") ; print json_encode($response);\' '+argsString+'', function(err, phpResponse, stderr) {
        if(err) console.log(err); /* log error */
            var connection = JSON.parse(phpResponse);	//console.log(connection);
        	res.json(connection);		
        });
        
	  }else{
		data["body"] = "Sub Category id is required.";
		res.json(data);
	  }
	}else{
		data["body"] = "Category id is required.";
		res.json(data);
	}
});




// API To check if username already exist.
app.post('/check_username_exists', function (req, res) {

  	var username		= req.body.username;
  	var data = { "error":1, "info":"" };
	
  if(!!username){
		connection.query("SELECT * FROM `its_user_details` WHERE `username` = '"+username+"' AND `user_type` = '3' " ,function(err, result, fields){
			//console.log(result);
			if(result.length == 0){
				data["error"] = 0;
				data["body"] = "Username doesn't exists.";
				res.json(data);
			}else{
				data["error"] = 1;
				data["body"] = "Username Already exists.";
				res.json(data);
			}
		});
  }else{
		data["body"] = "username is required.";
		res.json(data);
  }
});




// API to increase user visitors
app.post('/get_profile_info', function (req, res) {

  	var userid		= req.body.userid;
  	var data = { "error":1, "info":"" };
	
  if(!!userid){
		connection.query("SELECT * FROM `its_user_details` WHERE `id` = '"+userid+"' AND `user_type` = '3' " ,function(err, userDetails, fields){
			//console.log(userDetails);
			if(userDetails.length != 0){
				data["error"] = 0;
				data["success"] =200;
				data["user_info"] = userDetails;
				res.json(data);
			}else{
				data["error"] = 1;
				data["body"] = "Userid doesn't exists.";
				res.json(data);
			}
		});
  }else{
		data["body"] = "userid is required.";
		res.json(data);
  }
});