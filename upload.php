<?php 
$upload_dir = "./uploads/";
$upload_file = $upload_dir . basename($_FILES["fileUp"]["name"]);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileUp"]["tmp_name"]);
	if ($check !== false) {
		echo "이미지 파일 종류는 = " . $check["mime"] . ".";
		$uploadOK = 1;
	} else {
		echo "file is not an image";
		$uploadOK = 0;
	}
}

if (file_exists($upload_file)) {
	echo "Sorry, file aleady exists";
	$uploadOK = 0;
}

if ($_FILES["fileUp"]["size"] > 5000000) {
	echo "Sorry, Your file us too large";
	$uploadOK = 0;
}

if ($uploadOK == 0) {
	echo "sorry, your file was not uploaded!";
} else {
	if (move_uploaded_file($_FILES["fileUp"]["tmp_name"], $upload_file)) {
        echo "<p>사진 파일 ". basename( $_FILES["fileUp"]["name"]). " 업로드 되었습니다.</p>";
		echo "<br><img src=/upload/uploads/". basename( $_FILES["fileUp"]["name"]). ">";
		echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
    } else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
		echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
    }
}

 ?>