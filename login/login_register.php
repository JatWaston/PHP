<?php
echo json_encode($_FILES['uploader']);

$target_path = './upload/' . basename($_FILES['uploader']['name']);

if (move_uploaded_file($_FILES['uploader']['tmp_name'], $target_path))
{
	echo json_encode(array('result' => 0));
}
else
{
	echo json_encode(array('result' => -1));
}
?>