<?php
	include_once('class_db.php');
	include_once('global.php');
// 	echo $_POST['submit'] . "<br />";
	$db = new class_dboperation(DBHOST,DBUSER,DBPWD,DBNAME,DBCHARSET);
	if (isset($_POST['submit'])) {
		echo $_POST['submit'] . "<br />";
		$account = $_POST['account'];
		$pwd = $_POST['pwd'];
		switch ($_POST['submit'])
		{
			case "login":
				$login_sql = "SELECT user_account,user_pwd FROM t_user WHERE user_account='$account'";
				echo $login_sql . "<br />";
				$resArray = $db->fetch_array($login_sql);
				print_r($resArray);
				echo "<br />";
				if ($resArray && $resArray['user_pwd'] == $pwd)
				{
					echo "login success!" . "<br />";
				}
				break;
			case "register":
				$email = $_POST['email'];
				$date = date("Y-m-d h:m:s");
				$register_sql = "INSERT INTO t_user (user_account,user_pwd,user_email,user_registerDate) VALUES ('$account','$pwd','$email','$date')";
				echo $register_sql . "<br />";
				$res = $db->query($register_sql);
				echo $res . "<br />";
				break;
		}
	}
	else {
		echo "submit is no come.";
	}
?>