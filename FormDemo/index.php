
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
		$name = $email = $website = $comment = $gender = "";
		?>
		<form action="" method="post">
			<h2>PHP表单验证实例</h2>
			<p><span class="error">*必填字段</span></p>
			姓名：<input type="text" name="name"><br/><br/>
			电邮：<input type="text" name="email"><br/><br/>
			网址：<input type="text" name="url"><br/><br/>
			评论：<textarea name="comment" rows="5" cols="40"></textarea><br/><br/>
			性别：
			<input type="radio" name="gender" value="female">女性
			<input type="radio" name="gender" value="male">男性
			<br/><br/>
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

