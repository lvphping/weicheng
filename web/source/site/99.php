<?php
$file1 = "/framework/class/1.php";
$file2 = "/framework/model/1.php";

if(!file_exists($file1)){
die($file1."文件不存在");//更新文件操作
}
$result = copy($file1,$file2);//操作执行
if($result){
	echo "成功"."<br/>";
}else{
	echo "失败"."<br/>";
}
?>