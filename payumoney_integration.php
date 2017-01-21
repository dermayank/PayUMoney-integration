<?php
/*
Plugin Name: Payumoney_integration
Plugin URI:
Description: Plugin to integrate payumoney 
Author: Mayank Joshi
Version: 1.0
Author URI: joshimayank456@gmail.com
*/
session_start();
add_action('admin_menu','payumoney_integration_admin_actions');


function payumoney_integration_admin_actions(){
    add_options_page('payumoney_integration','payumoney_integration','manage_options',_FILE_,'payumoney_integration_admin');
	define( 'payumoney_integration_dir', plugin_dir_path( __FILE__ ) );
}

function payumoney_integration_admin(){
?>
    <html>
     <head>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
      </head>
    <body>
        <h1> Enter Salt and txnid </h1><br>
        <form action="" method="post">
		  Salt: <input type="text" name="salt"/> 
          Merchant Id: <input type="text" name="mcid"/>
          <input type="submit" value="Submit"/>
        </form><br><br><br>
        
	  <?php
		if (isset($_POST['salt']) && isset($_POST['mcid']) )
        {
          $salt = $_POST['salt'];
          $txnid = $_POST['mcid'];
          if(!empty($salt) && !empty($txnid)){
			$_SESSION["salt"] = $salt;
            $_SESSION["mcid"] = $txnid;
			$_SESSION["connection"] = 1;
			echo"<h2>Your salt and merchant id are successfully recieved. Now you can go ahead and continue with transactions</h2>";
			$str = plugins_url( 'payumoney/', __FILE__ );
			echo plugin_dir_path( __FILE__ ). 'function.php';
			
		  }
		  else{
			  echo "<h2>Please properly fill all the asked parameter </h2><br><br>";
		  }
		}
        ?>
		
    <?php
 }
?>
