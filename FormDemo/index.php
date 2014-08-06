
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>评论</title>
		<style type="text/css">
		.error {color:#FF0000;}
		</style>
	</head>
	<body>
		<?php 
		require_once '../communalClass/class_db.php';
		require_once '../communalClass/global.php';
		$db = new class_dboperation(DBHOST,DBUSER,DBPWD,DBNAME,'GB2312');
		//print_r($_SERVER);
		$name = $email = $website = $comment = $gender = "";
		$nameError = $emailError = $websiteError = $genderError = "";
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (empty($_POST['name'])) {
				$nameError = "名字不能为空";
			}
			else {
				$name = test_input($_POST['name']);
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  					$nameError = "只允许字母和空格！"; 
				}
			}
			
			if (empty($_POST['email'])) {
				$emailError = "邮箱不能为空";
			}
			else {
				$email = test_input($_POST['email']);
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
					$emailError = "无效的 email 格式！";
				}
			}
			
			if (empty($_POST['gender'])) {
				$genderError = "性别不能为空";
			}
			else {
				$gender = test_input($_POST['gender']);
			}
			$website = test_input($_POST['url']);
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
				=~_|]/i",$website)) {
				$websiteError = "无效的 URL";
			}
			$comment = test_input($_POST['comment']);
			
			$date = date("Y-m-d h:m:s");
			if ($gender == 'female') {
				$sql = "INSERT INTO comment (name,email,website,comment,sex,commentDate) VALUES ('$name','$email','$website','$comment','1','$date')";
			}
			else
			{
				$sql = "INSERT INTO comment (name,email,website,comment,sex,commentDate) VALUES ('$name','$email','$website','$comment','0','$date')";
			}
			$res = $db->query($sql);
			echo $res . "<br/>";
			
			
			
		}

		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		?>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<h2>PHP表单验证实例</h2>
			<p><span class="error">*必填字段</span></p>
			姓名：<input type="text" name="name" value="<?php echo $name;?>"><span class="error">*<?php echo $nameError;?></span><br/><br/>
			电邮：<input type="text" name="email" value="<?php echo $email;?>"><span class="error">*<?php echo $emailError;?></span><br/><br/>
			网址：<input type="text" name="url" value="<?php echo $website;?>"><span class="error"><?php echo $websiteError;?></span><br/><br/>
			评论：<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br/><br/>
			性别：
			<input type="radio" name="gender" <?php if(isset($gender) && $gender == "female") echo "checked";?> value="female">女性
			<input type="radio" name="gender" <?php if(isset($gender) && $gender == "male") echo "checked";?> value="male">男性
			<span class="error">*<?php echo $genderError;?></span><br/><br/>
			<input type="submit" name="submit" value="提交">
		</form>
		<?php 
			echo "<h2>你的输入:</h2>";
			echo $name . "<br/>";
			echo $email . "<br/>";
			echo $website . "<br/>";
			echo $comment . "<br/>";
			echo $gender . "<br />";
		?>
	</body>
</html>

