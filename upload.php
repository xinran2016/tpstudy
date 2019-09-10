<?php
	//接收表单提交的用户头像：$_FILES['user_pic']
	//php环境是utf8编码
	//保存的目的地是window系统下，使用gbk编码
	$file = iconv('utf-8', 'gbk', $_FILES['user_pic']['name']);
	if(move_uploaded_file($_FILES['user_pic']['tmp_name'], './uploads/'.$file)){
		echo "上传成功";
	}else{
		echo "上传失败";
	}
