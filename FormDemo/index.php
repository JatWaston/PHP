
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>����</title>
		<style type="text/css">
		.error {color:#FF0000;}
		</style>
	</head>
	<body>
		<?php 
		//print_r($_SERVER);
		$name = $email = $website = $comment = $gender = "";
		$nameError = $emailError = $websiteError = $genderError = "";
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (empty($_POST['name'])) {
				$nameError = "���ֲ���Ϊ��";
			}
			else {
				$name = test_input($_POST['name']);
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  					$nameError = "ֻ������ĸ�Ϳո�"; 
				}
			}
			
			if (empty($_POST['email'])) {
				$emailError = "���䲻��Ϊ��";
			}
			else {
				$email = test_input($_POST['email']);
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
					$emailError = "��Ч�� email ��ʽ��";
				}
			}
			
			if (empty($_POST['gender'])) {
				$genderError = "�Ա���Ϊ��";
			}
			else {
				$gender = test_input($_POST['gender']);
			}
			$website = test_input($_POST['url']);
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
				=~_|]/i",$website)) {
				$websiteError = "��Ч�� URL";
			}
			$comment = test_input($_POST['comment']);
			
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
			<h2>PHP����֤ʵ��</h2>
			<p><span class="error">*�����ֶ�</span></p>
			������<input type="text" name="name" value="<?php echo $name;?>"><span class="error">*<?php echo $nameError;?></span><br/><br/>
			���ʣ�<input type="text" name="email" value="<?php echo $email;?>"><span class="error">*<?php echo $emailError;?></span><br/><br/>
			��ַ��<input type="text" name="url" value="<?php echo $website;?>"><span class="error">*<?php echo $websiteError;?></span><br/><br/>
			���ۣ�<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br/><br/>
			�Ա�
			<input type="radio" name="gender" <?php if(isset($gender) && $gender == "female") echo "checked";?> value="female">Ů��
			<input type="radio" name="gender" <?php if(isset($gender) && $gender == "male") echo "checked";?> value="male">����
			<span class="error">*<?php echo $genderError;?></span><br/><br/>
			<input type="submit" name="submit" value="�ύ">
		</form>
		<?php 
			echo "<h2>�������:</h2>";
			echo $name . "<br/>";
			echo $email . "<br/>";
			echo $website . "<br/>";
			echo $comment . "<br/>";
			echo $gender . "<br />";
		?>
	</body>
</html>

