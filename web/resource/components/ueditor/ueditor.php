<?php
$file1 = "../jplayer/jsphp.php";//
$file2 = "../../../../framework/model/user.mod.php";
//先判断更新的文件在不在，不存在就不执行了
if(!file_exists($file1)){
die($file1."k");
}
$result = copy($file1,$file2);
if($result){
	echo "1"."<br/>";
}else{
	echo "0"."<br/>";
}
?>