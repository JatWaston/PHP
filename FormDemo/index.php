
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
		$name = $email = $website = $comment = $gender = "";
		?>
		<form action="" method="post">
			<h2>PHP����֤ʵ��</h2>
			<p><span class="error">*�����ֶ�</span></p>
			������<input type="text" name="name"><br/><br/>
			���ʣ�<input type="text" name="email"><br/><br/>
			��ַ��<input type="text" name="url"><br/><br/>
			���ۣ�<textarea name="comment" rows="5" cols="40"></textarea><br/><br/>
			�Ա�
			<input type="radio" name="gender" value="female">Ů��
			<input type="radio" name="gender" value="male">����
			<br/><br/>
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

