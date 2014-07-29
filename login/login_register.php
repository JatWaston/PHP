<?php
// 	echo $_POST['submit'] . "<br />";
	if (isset($_POST['submit'])) {
		switch ($_POST['submit'])
		{
			case "login":
				echo "login..." . "<br />";
				break;
			case "register":
				echo "register..." . "<br />";
				break;
		}
		echo $_POST['account'] . "<br />";
		echo $_POST['pwd'] . "<br />";
	}
	else {
		echo "submit is no come.";
	}
?>